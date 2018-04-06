<div class="row" id="project_information_inputs">
    <h3 class="hidden">Project Information</h3>
    <div id="projectName" class="input columns small-12 medium-6">
        <label for="name">
            <h4 class="title">Project Name</h4>
            <a href="#" class="tip"><span class="tooltip">Required. Give Your Project a Name!</span>?</a>
        </label>
        <input type="text" id="name" name="name" class="required"
            value="<?php if (isset($_POST['name'])) :
                echo $_POST['name'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_name'];
            endif; ?>"
        />
        <?php echo form_error('name', '<p class="error">', '</p>');?>
    </div>

    <div id="date" class="input columns small-12 medium-6">
        <label for="d">
            <h4 class="title">Projected Start Date for Project</h4>
        </label>
        <input type="text" id="d" name="projectedDate"
            value="<?php if (isset($_POST['projectedDate'])) :
                echo $_POST['projectedDate'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_projectedDate'];
            endif; ?>"
        />
    </div>

    <div id="projectLocation" class="input columns small-12 medium-6">
        <label for="cityProv">
            <h4 class="title">City  &amp; State/Province</h4>
            <a href="#" class="tip"><span class="tooltip">The projected location of this project.</span>?</a>
        </label>
        <input type="text" id="cityProv" name="cityProv"
            value="<?php if (isset($_POST['cityProv'])) :
                echo $_POST['cityProv'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_location'];
            endif; ?>"
        />
    </div>

    <div id="projectAddress" class="input columns small-12 medium-6">
        <label for="addr">
            <h4 class="title">Address</h4>
            <a href="#" class="tip"><span class="tooltip">The address of this job. Not Required.</span>?</a>
        </label>
        <input type="text" id="addr" name="addr"
            value="<?php if (isset($_POST['addr'])) :
                echo $_POST['addr'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_address'];
            endif; ?>"
        />
    </div>

    <div id="engineer" class="input columns small-12 medium-6">
        <label for="engineerName">
            <h4 class="title">Engineer Name</h4>
            <a href="#" class="tip"><span class="tooltip">Name of the Engineer undertaking this project.</span>?</a>
        </label>
        <input type="text" id="engineerName" name="engineerName"
            value="<?php if (isset($_POST['engineerName'])) :
                echo $_POST['engineerName'];
            elseif (isset($estimate)) :
                echo $estimate['estimate_engineer'];
            endif; ?>"
        />
    </div>

    <div class="columns small-12 medium-6">
        <label for="measurement">
            <h4 class="title">Measurement</h4>
            <a href="#" class="tip"><span class="tooltip">Will you be filling out this form in Metric or Imperial?</span>?</a>
        </label>

        <div id="hideTheMetric">
            <h4 class="label">Metric</h4>
            <div class="checkbox">
                <input id="hideMetric" name="hideMetric" type="checkbox"
                    <?php if (isset($_POST['hideMetric']) || empty($_POST)) { echo 'checked'; } ?>
                />
                <label for="hideMetric"></label>
            </div>
        </div>

        <div id="hideTheImperial">
            <h4 class="label">Imperial</h4>
            <div class="checkbox">
                <input id="hideImperial" name="hideImperial" type="checkbox"
                    <?php if (isset($_POST['hideImperial']) || empty($_POST)) { echo 'checked'; } ?>
                />
                <label for="hideImperial"></label>
            </div>
        </div>
    </div>
</div>