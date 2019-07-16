
<?=$this->render('@app/modules_share/foot/views/default/panel_top',[
   'tabimage' => '',
   'tabsummary' => 'active',
    'tabcomplate' =>'',
    'tabfirst' =>'',
    'tabfu'=>'' 
    ])?>
    <br>
    <?=$this->render('./summary_top.php',['opd'=>'active','ipd' => ''])?>

    <!-- <div id="opd" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="ipd" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div> -->
    <?=$this->render('./summary_footer.php')?>


<?=$this->render('@app/modules_share/foot/views/default/panel_foot')?>

