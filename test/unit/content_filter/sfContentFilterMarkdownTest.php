<?php

require dirname(__FILE__).'/../../bootstrap/unit.php';

$markdown = "
>**TIP**
>Testing tip

-

>**NOTE**
>Testing note

-

>**QUOTE**
>Testing quote

    [php]
    echo 'test';

-

    [yml]
    ---
    User:
      columns:
        username: string(255)
";

$html = '<div class="markdown"><blockquote class="tip"><p>
  Testing tip</p>
</blockquote>



<blockquote class="note"><p>
  Testing note</p>
</blockquote>



<blockquote class="quote"><p>
  Testing quote</p>
</blockquote>

<pre class="php"><span class="kw2">&lt;?php</span>
&nbsp;
<span class="kw3">echo</span> <span class="st0">\'test\'</span>;
&nbsp;
<span class="kw2">?&gt;</span></pre>



<pre><code class="yaml"><span class="yaml_top_dashes">---</span>
<span class="yaml_keys">User</span><span class="yaml_colon">:</span>
<span class="yaml_keys">  columns</span><span class="yaml_colon">:</span>
<span class="yaml_keys">    username</span><span class="yaml_colon">:</span><span class="yaml_string"> string(255)</span>
</code></pre>
</div>';

$t = new lime_test(1);

$filter = new sfContentFilterMarkdown(array('max_text_length' => 30));
$t->is($filter->filter($markdown), $html, 'Correctly converted the Markdown to HTML');