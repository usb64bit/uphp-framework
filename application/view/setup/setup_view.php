<?php

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!empty($this->success))
        echo $this->success;
?>

<br />
create a controller and a view file<br/> 
        example: test<br/>
        that will create test_controller.php and test_view.php
        <form action="<?php echo PATH . 'setup';?>" method="post">
            <input name="setup" type="text" />
            <input type="submit" value="submit" />
        </form>