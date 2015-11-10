<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
<hr>
</br>
    <?php 
        if ($action == "home"){
        echo '<li class="active"><a href="?action=home">Home</a></li>';
        }
        else
        {
        echo ' <li><a href="?action=home">Home</a></li>';
       }
        if ($action == "calendar"){
        echo '<li class="active"><a href="?action=calendar">Calendar</a></li>';
        }
        else
        {
        echo ' <li><a href="?action=calendar">Calendar</a></li>';
       }
               if ($action == "calendar"){
        echo '<li class="active"><a href="?action=calendar">Payroll</a></li>';
        }
        else
        {
        echo ' <li><a href="?action=calendar">Payroll</a></li>';
       }
               if ($action == "calendar"){
        echo '<li class="active"><a href="?action=calendar">Actor</a></li>';
        }
        else
        {
        echo ' <li><a href="?action=calendar">Actor</a></li>';
       }
    ?>
  </ul>
</div>