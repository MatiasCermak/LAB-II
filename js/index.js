let cards = document.getElementById('card-section').getElementsByClassName('card-deck');
let prevbt = document.getElementById('prevbt');
let nextbt = document.getElementById('nextbt');
if(cards.length == 1) nextbt.classList.add('disabled');
let cardPos = 0;


nextbt.addEventListener('click', function(event) {
    if(nextbt.classList.contains('disabled')) return;
    if(cardPos == 0) prevbt.classList.toggle('disabled');
    cards[cardPos].classList.toggle('inv');
    cardPos++;
    cards[cardPos].classList.toggle('inv');
    if(cardPos == (cards.length - 1)) nextbt.classList.toggle('disabled');

});

prevbt.addEventListener('click', function(event) {
    if(prevbt.classList.contains('disabled')) return;
    if(cardPos == (cards.length - 1)) nextbt.classList.toggle('disabled');
    cards[cardPos].classList.toggle('inv');
    cardPos--;
    cards[cardPos].classList.toggle('inv');
    if(cardPos == 0) prevbt.classList.toggle('disabled');
});