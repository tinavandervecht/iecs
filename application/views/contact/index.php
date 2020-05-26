<main>
    <section class="row expanded" id="mainDashboard">
        <div class="columns small-12 medium-12">
            <h2>Contact Us</h2>
            <?php if(isset($formErrors) && $formErrors): ?>
                <div class="alert alert-danger">
                    <?php echo $formErrors; ?>
                </div>
            <?php endif; ?>
            <?php if(isset($formSubmitted) && $formSubmitted): ?>
                <div class="alert alert-success">
                    Request successfully submitted.
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="columns small-12 medium-3 card left">
                    <a href="#"
                        disabled="disabled"
                        class="modalButton greenButton email deleteCompanyBtn"
                        data-reveal-id="requestAQuoteModal"
                    >
                        Request a Quote
                    </a>
                    <a href="#"
                        disabled="disabled"
                        class="modalButton greenButton email deleteCompanyBtn"
                        data-reveal-id="requestWebinarModal"
                    >
                        Request a Lunch & Learn Webinar
                    </a>
                </div>
                <div class="columns small-12 medium-9 card right">
                    <h2 class="green-text">Head Office</h2>
                    <p>
                        22295 Hoskins Line
                        <br />
                        Rodney, Ontario, Canada N0L 2C0
                        <br />
                        Phone : 1-800-821-7462
                        <br />
                        Fax : 1-866-496-1990
                        <br />
                        Louis Arvai – Eastern Canada & International Inquiries – <a href="mailto:larvai@iecs.com">larvai@iecs.com</a>
                        <br />
                        Greg Arvai – Ontario Sales Manager / GTA Inquiries – <a href="mailto:garvai@iecs.com">garvai@iecs.com</a>
                        <br />
                        David Talan – Southwestern Ontario Inquiries – <a href="mailto:dtalan@iecs.com">dtalan@iecs.com</a>
                        <br />
                        Nnamdi Eguh – Africa Inquiries – <a href="mailto:nnamdieguh@iecsinternational.com">nnamdieguh@iecsinternational.com</a>
                    </p>
                    <h2 class="green-text"> Western Canadian Headquarters</h2>
                    <p>
                        Phone: 1-800-821-7462
                        <br />
                        Matt McArthur – Western Canada Inquiries – <a href="mailto:mmcarthur@iecs.com">mmcarthur@iecs.com</a>
                        <br />
                        Craig Hare – British Columbia Inquiries – <a href="mailto:chare@iecs.com">chare@iecs.com</a>
                    </p>
                    <h2 class="green-text">Nigeria Office</h2>
                    <p>
                        Lagos, Nigeria
                        <br />
                        Nnamdi Eguh – <a href="mailto:nnamdieguh@iecsinternational.com">nnamdieguh@iecsinternational.com</a>
                        <br />
                        Tel: 011-234-1-342-2436
                    </p>

                    <h2 class="green-text">Uganda Office</h2>
                    <p>
                        Kampala, Uganda
                        <br />
                        Godfrey B. Zaribwende – <a href="mailto:gzaribwende@babcon.co.ug">gzaribwende@babcon.co.ug</a>
                        <br />
                        Tel: 256-414-220327
                    </p>
                    <h2 class="green-text">Zambia Office</h2>
                    <p>
                        Lusaka, Zambia
                        <br />
                        Henry Ngulube – <a href="mailto:henryngulube@gmail.com">henryngulube@gmail.com</a>
                        <br />
                        Tel: 260-977-806-110
                    </p>
                    <hr />
                    <h2 class="green-text">IECS Ready Mix Inc.</h2>
                    <p>
                        22253 Hoskins Line, Rodney ON, N0L2C0
                        <br />
                        Phone: 519-785-IECS(4327)
                    </p>
                    <h2 class="green-text">IECS Trucking</h2>
                    <p>
                        22295 Hoskins Line
                        <br />
                        Rodney, Ontario, Canada N0L 2C0
                        <br />
                        Phone : 1-800-821-7462
                        <br />
                        Fax : 1-866-496-1990
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<div id="overlay"></div>
<div id="requestAQuoteModal" class="custom-modal"
    style="<?php echo form_error('request_quote_message', '<p class="error">', '</p>') != ''
        || form_error('request_quote_subject', '<p class="error">', '</p>') != ''
        ? 'display:block;opacity:1'
        : ''; ?>"
>
    <?php $attributes = array('novalidate' => 'novalidate');
        echo form_open('/contact/requestQuote', $attributes);
    ?>
        <h2>REQUEST A QUOTE</h2>
        <label>Subject:</label><br>
        <input id="subject" name="request_quote_subject" value="<?php echo isset($_POST['request_quote_subject']) && $_POST['request_quote_subject'] ? $_POST['request_quote_subject'] : 'REQUEST FOR QUOTE'; ?>">
        <?php echo form_error('request_quote_subject', '<p class="error">', '</p>');?>
        <br><br>

        <label>Message:</label><br>
        <textarea id="textarea" name="request_quote_message"><?php echo isset($_POST['request_quote_message']) && $_POST['request_quote_message'] ? $_POST['request_quote_message'] : ''; ?></textarea>
        <?php echo form_error('request_quote_message', '<p class="error">', '</p>');?>

        <button type="submit" class="greenButton email" id="sendit">SEND</a>
    </form>
</div>

<div id="requestWebinarModal" class="custom-modal"
    style="<?php echo form_error('request_webinar_message', '<p class="error">', '</p>') != ''
        || form_error('request_webinar_subject', '<p class="error">', '</p>') != ''
        ? 'display:block;opacity:1'
        : ''; ?>"
>
    <?php $attributes = array('novalidate' => 'novalidate');
        echo form_open('/contact/requestWebinar', $attributes);
    ?>
        <h2>REQUEST A LUNCH & LEARN WEBINAR</h2>
        <label>Subject:</label><br>
        <input id="subject" name="request_webinar_subject" value="<?php echo isset($_POST['request_webinar_subject']) && $_POST['request_webinar_subject'] ? $_POST['request_webinar_subject'] : 'REQUEST FOR LUNCH & LEARN WEBINAR'; ?>">
        <?php echo form_error('request_webinar_subject', '<p class="error">', '</p>');?>
        <br><br>

        <label>Message:</label><br>
        <textarea id="textarea" name="request_webinar_message"><?php echo isset($_POST['request_webinar_message']) && $_POST['request_webinar_message'] ? $_POST['request_webinar_message'] : ''; ?></textarea>
        <?php echo form_error('request_webinar_message', '<p class="error">', '</p>');?>

        <button type="submit" class="greenButton email" id="sendit">SEND</a>
    </form>
</div>
