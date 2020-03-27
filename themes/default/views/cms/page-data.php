

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;display=swap" rel="stylesheet">
<style>
   
    h3
    {
      font-family: 'Josefin Sans', serif !important;   
    }
    .bg-light {
	    background-color: #FFF !important;
	}
	.shadow-md {
	    -webkit-box-shadow: 0px 0px 50px -35px rgba(0, 0, 0, 0.4);
	    box-shadow: 0px 0px 50px -35px rgba(0, 0, 0, 0.4);
	    font-family: 'Josefin Sans', serif !important;   
	    padding: 1.5rem!important;
	}
	.panel-default>.panel-heading
	{
		padding: 8px 0px;
	    background: transparent;
	    border: 0;
	    text-transform: none;
	}
	.panel-group .panel
	{
		border:0;
		    border-bottom: 1px solid #ddd;
	}
	.panel-default>.panel-heading a:focus {
	        text-decoration: none;
	}
	ol li
	{
		list-style-type: decimal;
	}
	.panel-default>.panel-heading a i {
	    transform: rotate(180deg);
	    transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
	}
	.panel-default>.panel-heading a.collapsed i
	{
		transform: rotate(0deg);
	}
</style>


<section class="formpadding">
<div id="content">
    <div class="container">
      <div class="bg-light shadow-md rounded p-4">
        <h2 class="text-6"><?php echo @$page_contents[0]->content_page_title; ?></h2>
        <p><?php echo @$page_contents[0]->content_body; ?></p>


      </div>
    </div>
    
  </div>
</section>

