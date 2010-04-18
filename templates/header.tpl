<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>BugBase - {$subtitle}</title>

  <!-- Stylesheets, javascripts -->
  <link rel="stylesheet" href="/static/style.css" type="text/css" media="screen" title="bugbase stylesheet" charset="utf-8" />
  <script src="static/scripts/jquery-1.3.2.min.js" type="text/javascript" language="javascript" charset="utf-8"></script>
  <script src="/static/scripts/bugbase.js" type="text/javascript" language="javascript" charset="utf-8" />
  
  <!--[if IE 6]>
    <script src="static/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>
      DD_belatedPNG.fix('div');
      DD_belatedPNG.fix('img');
      DD_belatedPNG.fix('a');
    </script>
  <![endif]-->

  <!--  page specifig js    -->
    {section name=i loop=$scripts}
        <script type="text/javascript" src="{$scripts[i]}" ></script>
    {/section}
</head>

<body>
<div id='wrapper'>
  <div id='headarea'>
    <div id='topmenu'>
      <a href='#'>ideamonk</a> | <a href='#'>logout</a>
    </div>
    <div id='headcontent'>
      
    </div>
  </div>
  <!-- end of #headarea -->
  
  <div id='content'>
    
