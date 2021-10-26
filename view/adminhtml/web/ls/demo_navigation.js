define([
    'jquery'
], function($){
    'use strict';
    $("#navigation_btn").click(function (){
        alert('Demo navigation button was clicked');
    })
});


function toggleActiveClass(event) {
    let parent = event.target.dataset.parent;
    let children = [...document.querySelectorAll(`[data-child='${parent}']`)];

    if (children) {
        children.forEach( el => {
            el.classList.toggle('active');
        })
    }
}
