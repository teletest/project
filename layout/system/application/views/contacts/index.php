<?php
Header('Cache-Control: no-cache');
Header('Pragma: no-cache');
$this->load->view('header');
?>

<div id="main-content">

<h1>Contact Manager</h1>

| {abc_tabs}{url} | {/abc_tabs}

<br /><br />

{contacts}
{url}<br />
{/contacts}

<pre>
{details}
Full Name : {name}
Login : {login}
email : {email}
Manager's Name : {manager_name}
Assistant's Name : {assisstant_name}
Assistant's Phone : {assisstant_phone} 
Company : {company}
Department : {department}
Web Page : {web_page}
</br>
<a href='{site_url}index.php/contacts/download_file/{id}'>Download</a>
{/details}


       
</pre>

</div>

<?php
$this->load->view('footer');
?>