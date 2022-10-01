const chat = document.getElementById('chat');
const comments = document.getElementById('comments');
const postComment = document.getElementById('post-comment');
const chart1 = document.getElementById('trandingview-widget');
const header = document.getElementById('header');
const commentInputArea = document.getElementById('comment-input-area')

const width = document.body.clientWidth;
const height = document.documentElement.clientHeight;
const widthPerGrid = width / 12;
const heightPerGrid = height / 12;

if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
    chart1.style.position = 'fixed';
    chart1.style.top = `0px`;
    chart1.style.left = `${(width - chart1.clientWidth) / 2}px`;
} else {

    chart1.style.position = 'fixed';
    chart1.style.left = `${widthPerGrid * 1}px`;
    chart1.style.top = `${height / 2 - chart1.clientHeight / 2}px`;

    chat.style.position = 'fixed';
    chat.style.width = `${widthPerGrid * 2.5}px`;
    chat.style.height = `${heightPerGrid * 12 - header.clientHeight}px`;
    chat.style.left = `${widthPerGrid * 9}px`;
    chat.style.top = `${header.clientHeight}px`;
    //chat.style.border = 'thick solid black';

    const chatHeightPerGrid = chat.clientHeight / 12;

    comments.style.position = 'absolute';
    comments.style.left = '0px';
    comments.style.top = '0px';
    comments.style.width = `${chat.clientWidth}px`;
    comments.style.height = `${chatHeightPerGrid * 9}px`;
    //comments.style.border = '1px solid red';

    postComment.style.position = 'absolute';
    postComment.style.left = '0px';
    postComment.style.top = `${comments.clientHeight}px`;
    postComment.style.width = `${chat.clientWidth}px`;
    postComment.style.height = `${chat.clientHeight - comments.clientHeight}px`;
    //postComment.style.border = '1px solid blue';
}
