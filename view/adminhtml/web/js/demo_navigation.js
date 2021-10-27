define([
    'jquery'
], function($){
    'use strict';
    function toggleActiveClass(event) {
        let parent = event.target.dataset.parent;

        let children = [...document.querySelectorAll(`[data-child='${parent}']`)];
        console.log(children)

        if (children.length !== 0) {
            children.forEach( el => {
                console.log(el)
                el.classList.toggle('active');
            })
        }
    }
    $("#navigation_btn").click(toggleActiveClass)
});



