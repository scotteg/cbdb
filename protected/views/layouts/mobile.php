<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.mobile-1.3.1.css' media='screen, projection'>
        <?php
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.mobile-1.3.1.js');
        ?>
    <title></title>
    </head>
    <body>
        <div data-role='collapsible' data-theme='b'>
            <h3>Main Menu</h3>
            <?php
            $linkOptions = array('data-role'=>'button', 'data-theme'=>'b', 'rel'=>'external');
            $htmlOptions = array('data-role'=>'controlGroup', 'class'=>'localnav');
            $items = array();
            
            if (Yii::app()->user->isGuest) {
                $items[] = array('label'=>'Login', 'url'=>array('/site/login'), 'linkOptions'=>$linkOptions);
            } else {
                $items[] = array('label'=>'Home', 'url'=>array('/site/index'), 'linkOptions'=>$linkOptions);
                $items[] = array('label'=>'Comic Books', 'url'=>array('/book'), 'linkOptions'=>$linkOptions);
                $items[] = array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'linkOptions'=>$linkOptions);
            }
            
            $non_mobile_uri = preg_replace('/mobile=on/', 'mobile=off', /*'/site/login');*/Yii::app()->request->baseUrl);
            $items[] = array('label'=>'Turn Off Mobile View', 'url'=>array('?mobile=off'), 'linkOptions'=>$linkOptions);
            $this->widget('zii.widgets.CMenu', array(
                'activeCssClass'=>'active', 'activateParents'=>true, 'htmlOptions'=>$htmlOptions, 'items'=>$items,
                )
            );
            ?>
        </div>
        <?php
        if (count($this->menu)) {
            echo "<div data-role='collapsible' data-theme='b'>\n";
            echo "\t<h3>Operations</h3>\n";
            
            foreach ($this->menu as $key=>$item) {
                $this->menu[$key]['linkOptions'] = $linkOptions;
            }
            
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>$htmlOptions,
                )
            );
//            $this->endWidget();
            echo "</div><!-- collapsible -->\n";
        }
        ?>
        <div data-role='content'>
            <?php echo $content; ?>
        </div>
        <div data-role='footer'>
            <center><?php echo Yii::powered(); ?></center>
        </div>
    </body>
</html>