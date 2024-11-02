// Check if reward has already been granted
function checkRewardEligibility() {
    return localStorage.getItem('youtubeRewardGiven') === 'true';
}

// Function to give reward
function giveReward() {
    if (!checkRewardEligibility()) {
        // Grant reward
        console.log("Reward granted!");

        // Update balance, e.g., increment balance by 25000 FXCN
        let balanceElement = document.querySelector('.coin-count-container h1');
        let currentBalance = parseInt(balanceElement.textContent) || 0;
        balanceElement.textContent = currentBalance + 25000;

        // Set flag in local storage
        localStorage.setItem('youtubeRewardGiven', 'true');
    } else {
        console.log("Reward already granted.");
    }
}

// Add click event to YouTube link
document.querySelector('.boosters-button-detail a').addEventListener('click', (event) => {
    giveReward();
});