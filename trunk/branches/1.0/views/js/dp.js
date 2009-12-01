//fonctions de verification
function confirmDelete(delUrl) {
	if (confirm("Etes-vous sur de vouloir effectuer cette suppression ?")) {
		document.location = delUrl;
	}
}

function verifInscription()
{
 if(document.inscription.userNewLogin.value == "")
 {
  alert(" Veuillez entrer votre pseudo svp ! ");
  document.inscription.userNewLogin.focus();
  return false;
 }
 else
 if(document.inscription.userNewEmail.value == "")
 {
  alert(" Veuillez entrer votre e.mail svp ! ");
  document.inscription.userNewEmail.focus();
  return false;
 } 
 else
 if(document.inscription.userNewPassword.value == "")
 {
  alert(" Veuillez entrer votre mot de passe svp ! ");
  document.inscription.userNewPassword.focus();
  return false;
 }
 else
 if(document.inscription.userNewPasswordConfirm.value == "")
 {
  alert(" Veuillez confirmer votre mot de passe svp ! ");
  document.inscription.userNewPasswordConfirm.focus();
  return false;
 } 
 else
 if((document.inscription.userNewPasswordConfirm.value) != (document.inscription.userNewPassword.value))
 {
  alert(" Veuillez entrer un mot de passe identique svp ! ");
  document.inscription.userNewPasswordConfirm.value = "";
  document.inscription.userNewPasswordConfirm.focus();
  return false;
 } 
 else
 return true;
}

function verifNewUser()
{
 if(document.formNewUser.pseudoNewUser.value == "")
 {
  alert(" Veuillez entrer un pseudo svp ! ");
  document.formNewUser.pseudoNewUser.focus();
  return false;
 }
 else
 if(document.formNewUser.emailNewUser.value == "")
 {
  alert(" Veuillez entrer un e.mail svp ! ");
  document.formNewUser.emailNewUser.focus();
  return false;
 } 
 else
 if(document.formNewUser.groupNewUser.value == "0")
 {
  alert(" Veuillez selectionner un groupe d'utilisateur svp ! ");
  document.formNewUser.emailNewUser.focus();
  return false;
 }  
 else
 return true;
}

function verifConnection()
{
 if(document.authentify.userEmail.value == "")
 {
  alert(" Veuillez entrer votre e.mail svp ! ");
  document.authentify.userEmail.focus();
  return false;
 }
 else
 if(document.authentify.userPassword.value == "")
 {
  alert(" Veuillez entrer votre mot de passe svp ! ");
  document.authentify.userPassword.focus();
  return false;
 } 
 else
 return true;
}

function verifPasswordForget()
{
 if(document.passwordforget.forgetUserEmail.value == "")
 {
  alert(" Veuillez entrer votre e.mail svp ! ");
  document.passwordforget.forgetUserEmail.focus();
  return false;
 }
 else
 return true;
}

function verifyValueSearch()
{
 if(document.formSearch.valueSearch.value == "")
 {
  alert(" Veuillez entrer vos mots cl�s ! ");
  document.formSearch.valueSearch.focus();
  return false;
 }
 else
 return true;
}


//
function verifNewCategory()
{
 if(document.formNewCategory.nameNewCategory.value == "" || document.formNewCategory.nameNewCategory.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewCategory.nameNewCategory.focus();
  return false;
 }
 else
 return true;
}

function verifNewObjective()
{
 if(document.formNewObjective.nameNewObjective.value == "" || document.formNewObjective.nameNewObjective.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewObjective.nameNewObjective.focus();
  return false;
 }
 else
 return true;
}


function verifNewSituation()
{
 if(document.formNewSituation.nameNewSituation.value == "" || document.formNewSituation.nameNewSituation.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewSituation.nameNewSituation.focus();
  return false;
 }
 else
 return true;
}

function verifNewSystem()
{
 if(document.formNewSystem.nameNewSystem.value == "" || document.formNewSystem.nameNewSystem.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewSystem.nameNewSystem.focus();
  return false;
 }
 else
 return true;
}

function verifNewAutor()
{
 if(document.formNewAutor.nameNewAutor.value == "" || document.formNewAutor.nameNewAutor.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewAutor.nameNewAutor.focus();
  return false;
 }
 else
 return true;
}


function verifNewActor()
{
 if(document.formNewActor.nameNewActor.value == "" || document.formNewCategory.nameNewActor.value == " ")
 {
  alert(" Veuillez entrer le libellé svp ! ");
  document.formNewActor.nameNewActor.focus();
  return false;
 }
 else
 return true;
}

//


function CheckDate(d) {
      // Cette fonction v�rifie le format JJ/MM/AAAA saisi et la validit� de la date. 
      // Le s�parateur est d�fini dans la variable separateur 
      var amin=2000; // ann�e mini
      var amax=2100; // ann�e maxi 
      var separateur="/"; // separateur entre jour/mois/annee
      var j=(d.substring(0,2)); 
      var m=(d.substring(3,5)); 
      var a=(d.substring(6)); 
      var ok=1; 

      if ( ((isNaN(j))||(j<1)||(j>31)||(d.substring(2,3)!=separateur)) && (ok==1) ) { 
         alert("Le jour n'est pas correct."); ok=0; 
      }

      if ( ((isNaN(m))||(m<1)||(m>12)||(d.substring(5,6)!=separateur)) && (ok==1) ) { 
         alert("Le mois n'est pas correct."); ok=0; 
      }

      if ( ((isNaN(a))||(a<amin)||(a>amax)||(d.substring(10)!="")) && (ok==1) ) { 
         alert("L'ann�e n'est pas correcte."); ok=0; 
      }

      if ( ((d.substring(2,3)!=separateur)||(d.substring(5,6)!=separateur)) && (ok==1) ) { 
         alert("Les s�parateurs doivent �tre des "+separateur); ok=0; 
      }

      if (ok==1) { 
         var d2=new Date(a,m-1,j); 
         j2=d2.getDate(); 
         m2=d2.getMonth()+1; 
         a2=d2.getYear(); 
         if (a2<=100) {a2=1900+a2} 
         if ( (j!=j2)||(m!=m2)||(a!=a2) ) { 
            alert("La date "+d+" n'existe pas !"); 
            ok=0; 
         } 
      } 
      return ok; 
}

//
function verifcheck(nameCheckBoxes)
{
 var listing = document.forms["listeprix"].elements[nameCheckBoxes];
 var nbcheck = 0;
 for (var i = 0; i < listing.length; i++) 
 {
  if (listing[i].checked)
  {
   nbcheck++;
  }
 }
 if (nbcheck == 0)
 {
  alert("Veuillez cocher un carrier svp !");
  return false; 
 }
 else
 if (nbcheck != 1)
 {
  alert("Veuillez cocher un seul carrier svp !");
  return false; 
 }
 else return true; 
}