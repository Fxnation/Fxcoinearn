const body = document.body;
const image = body.querySelector('#coin');
const h1 = body.querySelector('h1');
const progressBar = body.querySelector('.progress-bar');

let coins = localStorage.getItem('coins');
let total = localStorage.getItem('total');
let power = localStorage.getItem('power');
let count = localStorage.getItem('count');

if (coins == null) {
    localStorage.setItem('coins', '0');
    h1.textContent = '0';
} else {
    h1.textContent = Number(coins).toLocaleString();
}

if (total == null) {
    localStorage.setItem('total', '500');
    body.querySelector('#total').textContent = '/500';
} else {
    body.querySelector('#total').textContent = `/${total}`;
}

if (power == null) {
    localStorage.setItem('power', '500');
    body.querySelector('#power').textContent = '500';
} else {
    body.querySelector('#power').textContent = power;
}

if (count == null) {
    localStorage.setItem('count', '1');
}

// Handle multiple simultaneous taps using pointerdown
image.addEventListener('pointerdown', (e) => {
    let x = e.pageX;
    let y = e.pageY;

    navigator.vibrate(5);  // Vibrate on touch (optional)

    coins = localStorage.getItem('coins');
    power = localStorage.getItem('power');

    // Ensure that power is available to add coins
    if (Number(power) > 0) {
        localStorage.setItem('coins', `${Number(coins) + 1}`);
        h1.textContent = `${(Number(coins) + 1).toLocaleString()}`;

        localStorage.setItem('power', `${Number(power) - 1}`);
        body.querySelector('#power').textContent = `${Number(power) - 1}`;
    }

    // Create floating +1 text for each tap
    const floatingText = document.createElement('div');
    floatingText.classList.add('floating-text');
    floatingText.textContent = '+1';
    floatingText.style.position = 'absolute';
    floatingText.style.left = `${x}px`;
    floatingText.style.top = `${y}px`;
    floatingText.style.fontSize = '20px';
    floatingText.style.color = 'green';
    floatingText.style.opacity = '1';
    floatingText.style.transition = 'all 1s ease-out';
    body.appendChild(floatingText);

    // Animate the floating text upwards and fading out
    setTimeout(() => {
        floatingText.style.transform = 'translateY(-50px)';
        floatingText.style.opacity = '0';
    }, 0);

    // Remove the floating text after animation
    setTimeout(() => {
        floatingText.remove();
    }, 1000);

    // Update progress bar
    progressBar.style.width = `${(100 * power) / total}%`;
});

setInterval(() => {
    count = localStorage.getItem('count');
    power = localStorage.getItem('power');
    if (Number(total) > power) {
        localStorage.setItem('power', `${Number(power) + Number(count)}`);
        body.querySelector('#power').textContent = `${Number(power) + Number(count)}`;
        progressBar.style.width = `${(100 * power) / total}%`;
    }
}, 1000);