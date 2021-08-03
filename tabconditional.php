<?php //that in your header
$tabscid = $_GET['id'];
?>

<?php // that in your page, if you don't want your tab files to be directly in the page's code, but as seperated php files
foreach (glob("pathtotabfolder/*.php") as $docname)
{
    include $docname;
}
?>

<?php // that in your footer
if (!empty($tabscid)) {
	$deftabval = "$tabprefix$tabscid"; // where $tabprefix is defined in requested page as in onclick="opentab(event, 'tabprefix #number')"
}
if ((!empty($tabscid)) || ($deftab == 1)) { /* checks if the page is requested with an ID as a form of "shortcut" to one of its tabs,
                                               or if with $deftab = '1'; it's supposed to have a default tab open.*/
	?><a id="defaultOpen" class="tablinks" data-evt="event" data-tab="<?php echo ($deftabval);?>" href="<?php if (empty($tabscid)) {echo "#";} else {echo "#tabpanel";}?>"></a><?php ; //on this line you can see how to make it so when defaultly opening a tab, it stays on top of the page, but when using a shortcut, it scrolls to the tab for example.
	?><script src="/../src/scripts/fscdeftab.min.js"></script><?php ;
} else {
	?><script src="/../src/scripts/fsctab.min.js"></script><?php ; /*if both of the above conditions are false, 
  it will use the script's version that doesn't ask for a default <a> to launch a tab when the page loads. Note that this is compatible with the scroll.js jquery script!*/
}
?>
