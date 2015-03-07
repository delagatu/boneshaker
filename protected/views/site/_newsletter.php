<div class='form'>
    <?php
    $newsletterRegisterForm = new NewsLetterRegisterForm();

    echo CHtml::activeLabelEx($newsletterRegisterForm, 'email');
    echo CHtml::activetextField($newsletterRegisterForm, 'email',
        array('class' => 'styled-input long-input',
            'id' => 'newsletterEmail',
            'title' => 'Inscrie-te la newsletter-ul <b>boneshaker.ro</b>',
            'data-validate-email' => $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_REGISTER_NEWSLETTER)
        )
    );
    ?>
    <?php
    echo CHtml::button('OK', array('id' => 'newsLetter'));
    ?>
    <span id='newsletterError' class="medium-input hidden"> </span>

</div>