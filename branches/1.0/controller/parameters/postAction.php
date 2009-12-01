<?php
	if(isset($_GET['logout']))
	{
	 	session_destroy();	
	 	Url::relocate("home.php");
	}
	
	if(isset($_POST["nameNewCategory"]))
	{
		$nameNewCategory = $_POST['nameNewCategory'];
		$category = new Category();
		$category->setName($nameNewCategory);
		$category->newCategory();
	}
	elseif(isset($_POST["nameNewObjective"]))
	{
		$nameNewObjective = $_POST['nameNewObjective'];
		$objective = new Objective();
		$objective->setName($nameNewObjective);
		$objective->newObjective();
	}
	elseif(isset($_POST["nameNewSituation"]))
	{
		$nameNewSituation = $_POST['nameNewSituation'];
		$situation = new Situation();
		$situation->setName($nameNewSituation);
		$situation->newSituation();
	}
	elseif(isset($_POST["nameNewSystem"]))
	{
		$nameNewSystem = $_POST['nameNewSystem'];
		$system = new System();
		$system->setName($nameNewSystem);
		$system->newSystem();
	}
	elseif(isset($_POST["nameNewActor"]))
	{
		$nameNewActor = $_POST['nameNewActor'];
		$actor = new Actor();
		$actor->setName($nameNewActor);
		$actor->newActor();
	}
	elseif(isset($_POST["nameNewAutor"]))
	{
		$nameNewAutor = $_POST['nameNewAutor'];
		$autor = new Autor();
		$autor->setName($nameNewAutor);
		$autor->newAutor();
	}
	//
	elseif(isset($_POST["nameUpdateCategory"]))
	{
		$nameUpdateCategory = $_POST['nameUpdateCategory'];
		$category = new Category();
		$category->setName($nameUpdateCategory);
		$categoryId = $_SESSION["categoryId"];
		$category->updateCategory($categoryId);
	}
	elseif(isset($_POST["nameUpdateObjective"]))
	{
		$nameUpdateObjective = $_POST['nameUpdateObjective'];
		$objective = new Objective();
		$objective->setName($nameUpdateObjective);
		$objectiveId = $_SESSION["objectiveId"];
		$objective->updateObjective($objectiveId);
	}
	elseif(isset($_POST["nameUpdateSituation"]))
	{
		$nameUpdateSituation = $_POST['nameUpdateSituation'];
		$situation = new Situation();
		$situation->setName($nameUpdateSituation);
		$situationId = $_SESSION["situationId"];
		$situation->updateSituation($situationId);
	}
	elseif(isset($_POST["nameUpdateSystem"]))
	{
		$nameUpdateSystem = $_POST['nameUpdateSystem'];
		$system = new System();
		$system->setName($nameUpdateSystem);
		$systemId = $_SESSION["systemId"];
		$system->updateSystem($systemId);
	}
	elseif(isset($_POST["nameUpdateAutor"]))
	{
		$nameUpdateAutor = $_POST['nameUpdateAutor'];
		$autor = new Autor();
		$autor->setName($nameUpdateAutor);
		$autorId = $_SESSION["autorId"];
		$autor->updateAutor($autorId);
	}
	elseif(isset($_POST["nameUpdateActor"]))
	{
		$nameUpdateActor = $_POST['nameUpdateActor'];
		$actor = new Actor();
		$actor->setName($nameUpdateActor);
		$actorId = $_SESSION["actorId"];
		$actor->updateActor($actorId);
	}
	
    $categoryList = Category::getAllCategory();			
	$_SESSION['categoryList'] = $categoryList;
	
	$objectiveList = Objective::getAllObjective();			
	$_SESSION['objectiveList'] = $objectiveList;
	
	$systemList = System::getAllSystem();			
	$_SESSION['systemList'] = $systemList;
	
	$situationList = Situation::getAllSituation();			
	$_SESSION['situationList'] = $situationList;
	
	$actorList = Actor::getAllActor();			
	$_SESSION['actorList'] = $actorList;
	
	$autorList = Autor::getAllAutor();			
	$_SESSION['autorList'] = $autorList;
    	
?>