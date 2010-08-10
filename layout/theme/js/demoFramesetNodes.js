//

// Copyright (c) 2006 by Conor O'Mahony.

// For enquiries, please email GubuSoft@GubuSoft.com.

// Please keep all copyright notices below.

// Original author of TreeView script is Marcelino Martins.

//

// This document includes the TreeView script.

// The TreeView script can be found at http://www.TreeView.net.

// The script is Copyright (c) 2006 by Conor O'Mahony.

//

// You can find general instructions for this file at www.treeview.net. 

//



// Configures whether the names of the nodes are links (or whether only the icons

// are links).

USETEXTLINKS = 1



// Configures whether the tree is fully open upon loading of the page, or whether

// only the root node is visible.

STARTALLOPEN = 0

USEFRAMES = 0

WRAPTEXT = 1
PRESERVESTATE = 1
HIGHLIGHT = 1


// Specify if the images are in a subdirectory;

//ICONPATH = "http://localhost:90/projects/php/radii/admin/theme/images/"



  foldersTree = gFld("Project Explorer", SITEURL+"/projects/")

  foldersTree.treeID = "Frameset"
  
  aux1 = insFld(foldersTree, gFld("New Project", SITEURL+"/projects/new_project"))

  aux1 = insFld(foldersTree, gFld("Site Plan", SITEURL+"/projects/site_plan"))
  aux2 = insFld(foldersTree, gFld("Nominal Plan", SITEURL+"/projects/nominal_plans"))

  insDoc(aux2, gLnk("S", "View Plan", SITEURL+"/projects/create_plan/1"))
  
  insDoc(aux2, gLnk("S", "Edit Plan", SITEURL+"/projects/create_plan/1"))
	
  insDoc(aux2, gLnk("S", "Import Plan", SITEURL+"/projects/create_plan/0"))

  insDoc(aux2, gLnk("S", "Display Existing Process", SITEURL+"/projects/display_process/1"))

  insDoc(aux2, gLnk("S", "Upload Calender Holiday", SITEURL+"/projects/upload_calendar"))



  aux2 = insFld(aux1, gFld("Planning Documents", SITEURL+"/projects/planing_documents"))
  //Rool out Menu

    	  aux1 = insFld(foldersTree, gFld("Site Rollout", SITEURL+"/projects/site_rollout/none/0/0/0/0/0"))

          aux2 = insFld(aux1, gFld("Rollout Log", SITEURL+"/projects/rollout_log"))

          aux2 = insFld(aux1, gFld("Rollout Documents", SITEURL+"/projects/rollout_documents"))

	      //Site Close Menu

	      aux1 = insFld(foldersTree, gFld("Site Close", SITEURL+"/projects/site_closing"))

          aux2 = insFld(aux1, gFld("Closing Documents", SITEURL+"/projects/closing_documents"))

          aux2 = insFld(aux1, gFld("Planning Documents", SITEURL+"/projects/planing_documents"))


		 aux1 = insFld(foldersTree, gFld("Project Closing",  SITEURL+"/projects/close_project"))
		 docAux = insDoc(aux1, gLnk("S", "Project Close",  SITEURL+"/projects/close_project"))
		 
   
    aux1 = insFld(foldersTree, gFld("Admin", SITEURL+"/admin"))
    
	aux1.iconSrc = ICONPATH + "complexType.gif"

    aux1.iconSrcClosed = ICONPATH + "complexType.gif"

    aux2 = insFld(aux1, gFld("General", SITEURL+"/admin"))
    aux2 = insFld(aux1, gFld("System", SITEURL+"/admin/system"))	
    aux2 = insFld(aux1, gFld("Components", SITEURL+"/admin/components"))	
    aux2 = insFld(aux1, gFld("Updates", SITEURL+"/admin/updates"))
    aux2 = insFld(aux1, gFld("Groups", SITEURL+"/admin/groups"))
    aux2 = insFld(aux1, gFld("Companies", SITEURL+"/admin/companies"))	
    aux2 = insFld(aux1, gFld("Persons", SITEURL+"/admin/persons"))
    aux2 = insFld(aux1, gFld("Feed Back", SITEURL+"/admin/feedback"))	
    aux2 = insFld(aux1, gFld("FM", SITEURL+"/admin/fm"))	







 