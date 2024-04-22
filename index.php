<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notepad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="../tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
	  tinymce.init({
		selector: '#textTab1,#textTab2,#textTab3,#textTab4,#textTab5,#textTab6,#textTab7,#textTab8,#textTab9,#textTab10,#textTab11,#textTab12,#textTab13,#textTab14',
		menubar: 'edit insert view format table tools',
		plugins: 'lists advlist link codesample wordcount',
		toolbar: 'bullist numlist forecolor wordcount| fontsize | bold italic | alignleft aligncenter alignright alignjustify| link'
	  });
  </script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>

<script>

document.addEventListener('DOMContentLoaded', function () {

//Add event listener
const saveItemClick = document.getElementById('save-item');
saveItemClick.addEventListener('click', function () {

	for (var i = 1; i <= 14; i++) {
		// Get the content of the textarea
		var textareaContent = tinymce.get('textTab' + i).getContent();

		// Send the content to the server using AJAX
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'save_content.php', true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				// Handle the response from the server (if needed)
				//alert(xhr.responseText);
			}
		};
		
		xhr.send('content=' + encodeURIComponent(textareaContent) + '&filename=tab' + i);
	}
	
	alert('File saved successfully');
	
});

  /*
  // Add event listener to your menu item
  const menuItemClick = document.getElementById('menu-item');
  menuItemClick.addEventListener('click', function () {

    const newTab = document.createElement('li');
    newTab.classList.add('nav-item');

    const newTabLink = document.createElement('a');
    newTabLink.classList.add('nav-link');
    newTabLink.setAttribute('data-toggle', 'tab');
    newTabLink.setAttribute('href', '#new-tab');
    newTabLink.textContent = 'New Tab';

    newTab.appendChild(newTabLink);

    // Add the new tab to the existing tabs
    const tabsContainer = document.getElementById('myTabs');
    tabsContainer.appendChild(newTab);

    // Create content for the new tab
    const newTabContent = document.createElement('div');
    newTabContent.classList.add('tab-pane', 'fade');
    newTabContent.setAttribute('id', 'new-tab');
    newTabContent.textContent = 'New Tab Content';

    // Add the new tab content to the existing content
    const contentContainer = document.querySelector('.tab-content');
    contentContainer.appendChild(newTabContent);

    // Activate the new tab
    $(newTabLink).tab('show');
	
  });*/  
});

</script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notepad</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">File <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <!-- <li><a href="#" id="menu-item">New</a></li> -->
          <li><a href="#" id="save-item">Save</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<ul class="nav nav-pills" id="myTabs">
	  <li class="active"><a data-toggle="tab" href="#tab1">TAB 1</a></li>
	  <li><a data-toggle="tab" href="#tab2">TAB 2</a></li>
	  <li><a data-toggle="tab" href="#tab3">TAB 3</a></li>
	  <li><a data-toggle="tab" href="#tab4">TAB 4</a></li>
	  <li><a data-toggle="tab" href="#tab5">TAB 5</a></li>
	  <li><a data-toggle="tab" href="#tab6">TAB 6</a></li>
	  <li><a data-toggle="tab" href="#tab7">TAB 7</a></li>
	  <li><a data-toggle="tab" href="#tab8">TAB 8</a></li>
	  <li><a data-toggle="tab" href="#tab9">TAB 9</a></li>
	  <li><a data-toggle="tab" href="#tab10">TAB 10</a></li>
	  <li><a data-toggle="tab" href="#tab11">TAB 11</a></li>
	  <li><a data-toggle="tab" href="#tab12">TAB 12</a></li>
	  <li><a data-toggle="tab" href="#tab13">TAB 13</a></li>
	  <li><a data-toggle="tab" href="#tab14">TAB 14</a></li>
	</ul>


	<div class="tab-content">
		<?php
			for ($i = 1; $i <= 14; $i++) {
				echo '<div id="tab' . $i . '" class="tab-pane fade in active">';
				
				echo '<textarea id="textTab' . $i . '" style="width:100%;height:80vh;overflow-y:scroll;resize:none;">';
				if (file_exists('_notes/tab' . $i))
					echo file_get_contents('_notes/tab' . $i);
				
				echo '</textarea></div>';
			}
		?>

	</div>
</div>


</body>
</html>
