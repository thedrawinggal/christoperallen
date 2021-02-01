import bodyLock from "../common-components/bodyLock";

let modal = () => {

    var modalTrigger = '.modal-trigger';
    var modalClose = '.modal-close';
    var modal = '.modal';

    $(modalTrigger).on('click', function () {
        bodyLock();
        $(modal).fadeIn();
    });

    $(modalClose).on('click', function () {
        bodyLock();
        $(modal).fadeOut();
    })
};

export default modal;
