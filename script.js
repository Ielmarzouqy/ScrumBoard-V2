

	          //reloadTasks();
			  function edit_tasks( id, title, date, description, priority, type, status){

			document.getElementById('id_hidden').value = id;
			document.getElementById('title').value = title;
			document.getElementById('task-date').value = date;
			document.getElementById('task-description').value = description;
			document.getElementById('task-priority').value = priority;
		   
			if(type==1){
				document.getElementById('task-type-feature').checked= true;
				
				}else{
					document.getElementById('task-type-bug').checked = true;
				}
			document.getElementById('task-status').value = status;
			
			}