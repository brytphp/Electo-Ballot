<div class="js-cookie-consent cookie-consent">

    <div class="d-flex flex-row justify-content-between align-items-center card cookie p-3">
        <div class="d-flex flex-row align-items-center"><img src="https://i.imgur.com/Tl8ZBUe.png" width="40">
            <div class="ml-2 mr-2"><span>We use third party cookies to personalize content. {!!
                    trans('cookieConsent::texts.message') !!}</span>
                <a class="learn-more" href="#"><strong>Learn more<i class="fa fa-angle-right ml-2"></i></strong></a>
            </div>
        </div>
        <div><button type="button" class="js-cookie-consent-agree cookie-consent__agree btn btn-dark">
                {{ trans('cookieConsent::texts.agree') }}
            </button></div>
    </div>
</div>




<style>
    .card {
        flex-direction: column;
        min-width: 0;
        color: #000;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;
        -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
        box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
    }

    .learn-more {
        text-decoration: none;
        color: #000;
        margin-top: 8px
    }

    .learn-more:hover {
        text-decoration: none;
        color: blue;
        margin-top: 8px
    }

</style>
