
	subject_id = '';
	function handleHttpResponse() {
		if (http.readyState == 4) {
			if (subject_id != '') {
				document.getElementById(subject_id).innerHTML = http.responseText;
			}
		}
	}
	function getHTTPObject() {
		var xmlhttp;
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			try {
				xmlhttp = new XMLHttpRequest();
			} catch (e) {
				xmlhttp = false;
			}
		}
		return xmlhttp;
	}
	var http = getHTTPObject(); // Create the HTTP Object

	function getScriptPage(id,div_id,base)
	{
		//alert(div_id);
		subject_id = id;
		//$content = document.getElementById(content_id).value;
		//$a = $("u1").val();
		//alert($a);
		//$("u1").val();
		//alert(base);
		http.open("GET", base+"/auto_check.php?content=" + escape(div_id), true);
		http.onreadystatechange = function() 
		{
			if(http.readyState == 4 && http.status == 200) 
			{
				alert(http.responseText);
			}
			
		}
		http.send(null);

		if(div_id.length>0)
		{
	//		box('1');
		}
		else
		{
	//		box('0');
		}

	}	

	function highlight(action,id)
	{
	  if(action)	
		document.getElementById('word'+id).bgColor = "#D2232A";
	  else
		document.getElementById('word'+id).bgColor = "#FFFFFF";
	}
	function display(word)
	{
		document.getElementById('box').value = word;
		document.getElementById('box').style.display = 'none';
		document.getElementById('box').focus();
	}


	function box(act)
	{
	  if(act=='0')	
	  {
		document.getElementById('box').style.display = 'none';

	  }
	  else
	  {
	  
		document.getElementById('box').style.display = 'block';	
		document.getElementById('box').value = 'fdas';
		document.getElementById('').focus();

	  }
	}