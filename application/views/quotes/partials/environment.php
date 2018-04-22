<div class="row">
    <div class="columns small-12">
        <h3 class="sectionTitle">Environment</h3>
    </div>

    <div class="columns small-12 medium-6" id="environment_inputs">
        <div id="source"  class="input clearfix">
            <h4 class="title">Outlet Source</h4>
            <label for="sourceType">
                <h5 class="unit">(river, manhole, etc.)</h5>
            </label>
            <select id="sourceType" name="sourceType">
                <option value="0"
                    <?php if ((isset($_POST['sourceType']) && $_POST['sourceType'] == 0)
                        || (isset($estimate) && $estimate['estimate_outLetSource'] == 0)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    River
                </option>
                <option value="1"
                    <?php if ((isset($_POST['sourceType']) && $_POST['sourceType'] == 1)
                        || (isset($estimate) && $estimate['estimate_outLetSource'] == 1)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Manhole
                </option>
                <option value="2"
                    <?php if ((isset($_POST['sourceType']) && $_POST['sourceType'] == 2)
                        || (isset($estimate) && $estimate['estimate_outLetSource'] == 2)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Pond
                </option>
                <option value="3"
                    <?php if ((isset($_POST['sourceType']) && $_POST['sourceType'] == 3)
                        || (isset($estimate) && $estimate['estimate_outLetSource'] == 3)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Weir
                </option>
                <option value="4"
                    <?php if ((isset($_POST['sourceType']) && $_POST['sourceType'] == 4)
                        || (isset($estimate) && $estimate['estimate_outLetSource'] == 4)) :
                        echo 'selected="true"';
                    endif; ?>
                >
                    Other
                </option>
            </select>
            <?php echo form_error('sourceType', '<p class="error">', '</p>');?>
        </div>

        <img src="<?php echo base_url('img/outlet_source.jpg');?>" class="calcDiagram hide-for-medium"  alt="">
    </div>

    <div class="columns small-12 medium-6" id="comment_inputs">
        <div id="comments"  class="input clearfix">
            <h4 class="title">Comments</h4>
            <label for="commentsBox"></label>
            <textarea id="commentsBox" name="commentsBox">
                <?php if (isset($_POST['commentsBox'])) :
                    echo $_POST['commentsBox'];
                elseif (isset($estimate)) :
                    echo $estimate['estimate_comments'];
                endif; ?>
            </textarea>
        </div>
    </div>
</div>