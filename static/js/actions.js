// Click icon widget$(document).ready(function () {    $('.chat_icon').click(function (event) {        $('.wrapper').toggleClass('active');    });});// Save message into new variableconst msgerForm = get(".msger-inputarea");const msgerInput = get(".msger-input");const msgerChat = get(".msger-chat");// Icons made by Freepik from www.flaticon.comconst BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";const BOT_NAME = "    EVAs";const PERSON_NAME = "You";// When button clickedmsgerForm.addEventListener("submit", event => {    event.preventDefault();        // get input user    const msgText = msgerInput.value;    if (!msgText) return;        // display it on user text bubble    appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);    msgerInput.value = "";    // call bot response function    botResponse(msgText);});function appendMessage(name, img, side, text) {    // function to be called whether it's from bot side(left) or user side(right)    const msgHTML = `        <div class="msg ${side}-msg">            <div class="msg-bubble">                <div class="msg-info">                    <div class="msg-info-name">${name}</div>                    <div class="msg-info-time">${formatDate(new Date())}</div>                </div>                <div class="msg-text">${text}</div>            </div>        </div>    `;    msgerChat.insertAdjacentHTML("beforeend", msgHTML);    msgerChat.scrollTop += 500;}function botResponse(rawText) {    // Bot Response    $.get("/get", { msg: rawText }).done(function (data) {        console.log(rawText);        console.log(data);        const msgText = data;                // Bot respond placing        appendMessage(BOT_NAME, BOT_IMG, "left", msgText);    });}// Utilsfunction get(selector, root = document) {    return root.querySelector(selector);}// date function to display it on user and bot bubble textfunction formatDate(date) {    const h = "0" + date.getHours();    const m = "0" + date.getMinutes();        return `${h.slice(-2)}:${m.slice(-2)}`;}// fungsi untuk input nama ke testing and get respondfunction inputName(){    const msgerForm = get(".msger-inputarea");    const msgerInput = get(".msger-input");    const msgerChat = get(".msger-chat");        msgerForm.addEventListener("submit", event => {        event.preventDefault();                // get input user        const msgText = msgerInput.value;        if (!msgText) return;                        // display it on user text bubble        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);        //        // call bot response function        msgTextt= '"'+msgText+'"';        botResponse(msgTextt);    });       // appendMessage(BOT_NAME, BOT_IMG, "left", msgText);}// function for input and get respond when pred_intent > threshold (in booking context)function inputNamee(){    const msgerForm = get(".msger-inputareaa");    const msgerInput = get(".msger-inputt");    const msgerChat = get(".msger-chat");        msgerForm.addEventListener("submit", event => {        event.preventDefault();                // get input user        const msgText = msgerInput.value;        if (!msgText) return;                        // display it on user text bubble        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);        //        // call bot response function        msgTextt= '"'+msgText+'"';        botResponse(msgTextt);    });}// function for input and get respond when pred_intent < threshold or unrecognize (in booking context)function inputNameee(){    const msgerForm = get(".msger-inputareaaa");    const msgerInput = get(".msger-inputtt");    const msgerChat = get(".msger-chat");        msgerForm.addEventListener("submit", event => {        event.preventDefault();                // get input user        const msgText = msgerInput.value;        if (!msgText) return;                        // display it on user text bubble        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);        //        // call bot response function        msgTextt= '"'+msgText+'"';        botResponse(msgTextt);    });}