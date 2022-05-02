var button = null;

$(document).ready(function(){
    $('.pay_btn').click(changeStatus);
    $('.edit_btn').click(openEditForm);
});

function openEditForm(){
    data = {id: this.id};
    url = 'http://localhost/lp2/api/contasRest/get_conta';
    $.post(url, data, loadForm);
}

function loadForm(d,s,x){
    console.log(x.responseText);
}

function changeStatus(){
    button = this;
    data = {id: this.id};
    url = 'http://localhost/lp2/api/contasRest/status_conta';
    $.post(url, data, changeColor);
}

function changeColor(d,s,x){
    if(d == 1){
        $(button).removeClass('red-text');
        $(button).addClass('blue-text');
    } else {
        $(button).removeClass('blue-text');
        $(button).addClass('red-text');
    }
}
