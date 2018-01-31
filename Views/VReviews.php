<div class="messages">
    <?php

    ?>
</div>
<div>
    <p><u>ВАШЕ ИМЯ</u></p>
    <label><input id="name" type="text"></label>
    <p><u>ОЦЕНКА</u></p>
    <div id="reviewStars-input">
        <input id="star-4" type="radio" name="reviewStars" value="great">
        <label title="Great" for="star-4"></label>

        <input id="star-3" type="radio" name="reviewStars" value="good">
        <label title="good" for="star-3"></label>

        <input id="star-2" type="radio" name="reviewStars" value="normal">
        <label title="normal" for="star-2"></label>

        <input id="star-1" type="radio" name="reviewStars" value="bad">
        <label title="bad" for="star-1"></label>

        <input id="star-0" type="radio" name="reviewStars" value="awful">
        <label title="awful" for="star-0"></label>
    </div>
    <input id="go" type="submit" value="Далее">
</div>
<style>
    input#go,input#name{
        text-underline: none;
        padding: 10px;
        background: gray;
    }
    #reviewStars-input input:checked ~ label, #reviewStars-input label, #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
        background: url('http://positivecrash.com/wp-content/uploads/ico-s71a7fdede6.png') no-repeat;
    }

    #reviewStars-input {
        overflow: visible;
        position: relative;
        float: left;
    }

    #reviewStars-input input {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;

        width: 43px;
        height: 40px;

        position: absolute;
        top: 0;
        z-index: 0;
    }

    #reviewStars-input input:checked ~ label {
        background-position: 0 -40px;
        height: 40px;
        width: 43px;
    }

    #reviewStars-input label {
        background-position: 0 0;
        height: 40px;
        width: 43px;
        float: right;
        cursor: pointer;
        margin-right: 10px;

        position: relative;
        z-index: 1;
    }

    #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
        background-position: 0 -40px;
        height: 40px;
        width: 43px;
    }

    #reviewStars-input #star-0 {
        left: 0;
    }
    #reviewStars-input #star-1 {
        left: 53px;
    }
    #reviewStars-input #star-2 {
        left: 106px;
    }
    #reviewStars-input #star-3 {
        left: 159px;
    }
    #reviewStars-input #star-4 {
        left: 212px;
    }
</style>

<?php
