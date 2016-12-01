<h2><?php echo "Hello ".$title."!"; ?></h2>

        <h3><?php echo "Your Company name is " . $userInfo[0]['company_name'] . "."; ?></h3>
        <div class="main">
                <p><?php echo "Your contact email is " . $userInfo[0]['company_email']; ?></p>
                <p><?php echo "Your last estimate took place at " . $userInfo[0]['estimate_date']; ?></p>
                <p><?php echo "Your last expected flow was " . $userInfo[0]['estimate_expectedFlow']; ?></p>
        </div>
