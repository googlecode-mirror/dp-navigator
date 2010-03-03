<?php

/**
 * dp actions.
 *
 * @package    dp-navigator
 * @subpackage dp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dpActions extends sfActions
{
  public function executeHome(sfWebRequest $request)
  {
    
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->dps = Doctrine::getTable('Dp')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DpForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DpForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeView(sfWebRequest $request)
  {
	if($request->getParameter('slug')) {
	  $dp = $this->getRoute()->getObject();
	} else {
      $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
	}
	$this->dp = $dp;
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
    $this->form = new DpForm($dp);

	$this->vDpId = $dp->getId();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
    $this->form = new DpForm($dp);

    $this->processForm($request, $this->form);
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
    $dp->delete();

    $this->redirect('dp/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dp = $form->save();

      //$this->redirect('dp/edit?id='.$dp->getId());
	  $this->redirect('dp/view?id='. $dp->getId());
    }
  }

  /* By Categories management */
  public function executeByCategories(sfWebRequest $request)
  {
	  $this->categories = Doctrine::getTable('Category')
      ->createQuery('a')
	  ->addOrderBy('a.name ASC')
      ->execute();

	  $this->dpsWithoutCategories = Doctrine_Query::create()
      ->from('Dp d')
      ->where('NOT EXISTS (SELECT d.id FROM DpCategory dc WHERE dc.dp_id = d.id)', 1)
	  ->execute();
  }

  /* Graph management */
  public function executeGraph(sfWebRequest $request)
  {
	$this->id = $request->getParameter('id');
	if($this->pagePath = sfConfig::get('sf_environment') == 'dev') {
	  $this->pagePath = 'frontend_dev.php/dp';
	} else {
	  $this->pagePath = 'dp';
	}
	$this->viewerPath = 'flash/DpViewer.swf';  // must be linked to asset directory (use public_path() in view)
	$this->xmlPath = 'flash/dps.xml';		   // must be linked to asset directory (use public_path() in view)

	if(!$request->hasParameter('id')){
	  $firstDp = Doctrine::getTable('Dp')
      ->createQuery('a')
	  ->orderBy('a.id ASC')
	  ->limit(1)
      ->fetchOne();

	  if(isset($firstDp)) {						// if there is at least one DP in database...
	    $this->id = $firstDp->getId();			// displays the first one.
	  }
	}
	
	/* Write XML file*/
	$dps = Doctrine::getTable('Dp')
      ->createQuery('a')
      ->execute();

	$dom =  new DomDocument('1.0'); 
	$graph = $dom->appendChild($dom->createElement('Graph')); // add root	

	// Add DP as Node
	foreach($dps as $dp) {
	  $node = $dom->createElement('Node');
	  $node->setAttribute('id', $dp->getId());
  	  $node->setAttribute('name', $dp->getName());
	  $node->setAttribute('desc', $dp->getProblem());
	  $node->setAttribute('nodeColor', "0x8F8FFF");
	  $node->setAttribute('nodeSize', 12);
	  $node->setAttribute('nodeClass', "tree");
	  $node->setAttribute('nodeIcon', "2");
	  $node->setAttribute('x', "10");
	  $node->setAttribute('y', "15");
	  $graph->appendChild($node); 
	}

	$drs = Doctrine::getTable('DpRelation')
      ->createQuery('a')
      ->execute();

//  <Edge fromID="2" toID="12" edgeLabel="Bad" flow="120" edgeClass="rain" edgeIcon="Bad" />

	//Add DpRelation as Edge
	foreach($drs as $dr) {
	  $edge = $dom->createElement('Edge');
	  $edge->setAttribute('fromID', $dr->getSourceId());
  	  $edge->setAttribute('toID', $dr->getTargetId());
	  $edge->setAttribute('edgeLabel', $dr->getType());
	  $edge->setAttribute('color', "0x8F8FFF");
	  $edge->setAttribute('edgeClass', 'rain');
	  $edge->setAttribute('edgeIcon', 'Bad');
	  $graph->appendChild($edge); 
	}

	$dom->formatOutput = true;
	$dom->save($this->xmlPath); // save as file 	
	
  }

  /* Publish management */
  public function executePublish(sfWebRequest $request)
  {
	$this->categories = Doctrine::getTable('Category')
      ->createQuery('a')
	  ->addOrderBy('a.name ASC')
      ->execute();

	$this->dpsWithoutCategories = Doctrine_Query::create()
      ->from('Dp d')
      ->where('NOT EXISTS (SELECT d.id FROM DpCategory dc WHERE dc.dp_id = d.id)', 1)
	  ->execute();

    $this->dps = Doctrine::getTable('Dp')
      ->createQuery('a')
      ->execute();
  }


  /* Relations management */

  public function executeEditRelations(sfWebRequest $request)
  {
    $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
	$this->dp = $dp;

	// fill an array with data necessary to display relations of the dp
	$this->relationsOut = $dp->getRelationsOut()->getData();

	// form to add a relation
	$this->form = new NewDpRelationForm(array('id'=> $dp->getId()));
  }

  public function executeCreateRelation(sfWebRequest $request)
  {	
    $this->forward404Unless($dp = Doctrine::getTable('Dp')->find(array($request->getParameter('id'))), sprintf('Object dp does not exist (%s).', $request->getParameter('id')));
	
	$dr = new DpRelation();
	$dr->setSourceId($request->getParameter('id'));
	$dr->setTargetId($request->getParameter('related_dp'));
	$dr->setTypeId($request->getParameter('relation_type'));
	$dr->save();

	$this->redirect('dp/editRelations?id='.$request->getParameter('id'));
  }

  public function executeDeleteRelation(sfWebRequest $request) {
	// Find DpRelation (because DpRelation has no id column)
	$out = explode('-', $request->getParameter('id'));
	$q = Doctrine::getTable('DpRelation')->createQuery('dr')
								->where('dr.source_id=?', $out[0])
								->andWhere('dr.target_id=?', $out[1]);
	$this->forward404Unless($dpRelation = $q->fetchOne(), sprintf('Object dpRelation does not exist (%s).', $request->getParameter('id')));

	// Deletion
	$dpRelation->delete();

	$this->redirect('dp/editRelations?id='.$request->getParameter('id'));
  
  }
}
