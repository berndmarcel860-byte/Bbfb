// Disable submit button by default when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Show first modal automatically
    document.getElementById('methodModal').style.display = 'block';

    // Only disable the submit button in the card modal
    const cardSubmitButton = document.querySelector('#cardModal .next-btn');
    if (cardSubmitButton) cardSubmitButton.disabled = true;

    // Add input event listeners for live validation
    document.querySelector('input[name="cardname"]').addEventListener('input', function(e) {
        validateName();
        updateSubmitButton();
    });

    document.querySelector('input[name="cardnumber"]').addEventListener('input', function(e) {
        formatCardNumber(this);
        validateCard();
        updateSubmitButton();
    });

    document.querySelector('input[name="expiry"]').addEventListener('input', function(e) {
        formatExpiryDate(this);
        validateExpiry();
        updateSubmitButton();
    });

    document.querySelector('input[name="cvc"]').addEventListener('input', function(e) {
        formatCVC(this);
        validateCVC();
        updateSubmitButton();
    });

    // Add blur event listeners for validation when leaving fields
    document.querySelector('input[name="cardname"]').addEventListener('blur', validateName);
    document.querySelector('input[name="cardnumber"]').addEventListener('blur', validateCard);
    document.querySelector('input[name="expiry"]').addEventListener('blur', validateExpiry);
    document.querySelector('input[name="cvc"]').addEventListener('blur', validateCVC);

    // Add focus event listener for card number to select all text
    document.querySelector('input[name="cardnumber"]').addEventListener('focus', function(e) {
        this.select();
    });
});

function updateSubmitButton() {
    const submitButton = document.querySelector('#cardModal .next-btn');
    const cardname = document.querySelector('input[name="cardname"]').value.trim();
    const cardnumber = document.querySelector('input[name="cardnumber"]').value.replace(/\s/g, '');
    const expiry = document.querySelector('input[name="expiry"]').value;
    const cvc = document.querySelector('input[name="cvc"]').value;

    // Check if all fields are filled AND valid
    const isNameValid = cardname.length >= 3 && !document.querySelector('input[name="cardname"]').classList.contains('error');
    const isCardValid = cardnumber.length >= 15 && !document.querySelector('input[name="cardnumber"]').classList.contains('error');
    const isExpiryValid = expiry.length === 5 && !document.querySelector('input[name="expiry"]').classList.contains('error');
    const isCVCValid = (cvc.length === 3 || cvc.length === 4) && !document.querySelector('input[name="cvc"]').classList.contains('error');

    submitButton.disabled = !(isNameValid && isCardValid && isExpiryValid && isCVCValid);
}

function formatCardNumber(input) {
    let value = input.value.replace(/\D/g, '');
    let formattedValue = '';
    const isAmex = value.startsWith('34') || value.startsWith('37');
    
    if (isAmex) {
        // Format: XXXX XXXXXX XXXXX
        for (let i = 0; i < value.length; i++) {
            if (i === 4 || i === 10) formattedValue += ' ';
            formattedValue += value[i];
        }
        input.maxLength = 17; // 15 digits + 2 spaces
    } else {
        // Format: XXXX XXXX XXXX XXXX
        for (let i = 0; i < value.length; i++) {
            if (i > 0 && i % 4 === 0) formattedValue += ' ';
            formattedValue += value[i];
        }
        input.maxLength = 19; // 16 digits + 3 spaces
    }
    
    input.value = formattedValue.trim();
    validateCard(); // Live validation
}

function formatExpiryDate(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length >= 2) {
        const month = parseInt(value.substring(0, 2));
        if (month > 12) value = '12' + value.slice(2);
        value = value.slice(0, 2) + '/' + value.slice(2);
    }
    input.value = value;
    if (value.length >= 5) validateExpiry(); // Live validation when complete
}

function formatCVC(input) {
    const cardNumber = document.querySelector('input[name="cardnumber"]').value.replace(/\s/g, '');
    const isAmex = cardNumber.startsWith('34') || cardNumber.startsWith('37');
    
    let value = input.value.replace(/\D/g, '');
    input.maxLength = isAmex ? 4 : 3;
    input.value = value;
    
    if (value.length >= input.maxLength) validateCVC(); // Live validation when complete
}

function validateCard() {
    const cardInput = document.querySelector('input[name="cardnumber"]');
    const cardNumber = cardInput.value.replace(/\s/g, '');
    const cardError = document.getElementById('cardError');

    // Known test/dummy card numbers to block
    const blockedNumbers = [
        '4111111111111111', // Most common test Visa
        '4242424242424242', // Stripe test card
        '4000056655665556', // Stripe test card
        '5555555555554444', // Common test Mastercard
        '5105105105105100', // Common test Mastercard
        '371449635398431',  // Common test Amex
        '378282246310005',  // Common test Amex
        '6011111111111117', // Common test Discover
        '3530111333300000', // Common test JCB
        '6222988812340000', // Common test Union Pay
        '4917484589897107', // Known test card
        '4001919257537193', // Known test card
        '4007702835532454', // Known test card
        '4012888818888', // Known test card
        '4500600000000061', // Known test card
        '5019717010103742', // Known test card
        '6331101999990016'  // Known test card
    ];

    // Block repeated digits patterns (more than 4 same digits in a row)
    if (/(.)\1{4,}/.test(cardNumber)) {
        cardInput.classList.add('error');
        cardError.textContent = 'Invalid card number pattern';
        cardError.classList.add('visible');
        return false;
    }

    // Block known test numbers
    if (blockedNumbers.includes(cardNumber)) {
        cardInput.classList.add('error');
        cardError.textContent = 'Please enter a valid card number';
        cardError.classList.add('visible');
        return false;
    }

    // Block simple sequences
    if (/^(?:1{16}|2{16}|3{16}|4{16}|5{16}|6{16}|7{16}|8{16}|9{16}|0{16})$/.test(cardNumber) ||
        /^(?:1234|2345|3456|4567|5678|6789|7890)/.test(cardNumber)) {
        cardInput.classList.add('error');
        cardError.textContent = 'Invalid card number pattern';
        cardError.classList.add('visible');
        return false;
    }

    // Card patterns
    const cardPatterns = {
        visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
        mastercard: /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/,
        amex: /^3[47][0-9]{13}$/,
        unionpay: /^62[0-9]{14,17}$/
    };

    // First, check if it's a valid card format
    let cardType = '';
    for (let type in cardPatterns) {
        if (cardPatterns[type].test(cardNumber)) {
            cardType = type;
            break;
        }
    }

    // Update CVC max length based on card type
    const cvcInput = document.querySelector('input[name="cvc"]');
    const isAmex = cardType === 'amex';
    cvcInput.maxLength = isAmex ? 4 : 3;
    cvcInput.placeholder = isAmex ? 'XXXX' : 'XXX';

    // If no valid format found and there's input
    if (cardNumber.length > 0 && !cardType) {
        cardInput.classList.add('error');
        cardError.textContent = 'Invalid card number format';
        cardError.classList.add('visible');
        return false;
    }

    // Luhn Algorithm validation
    function luhnCheck(cardNumber) {
        let sum = 0;
        let isEven = false;

        for (let i = cardNumber.length - 1; i >= 0; i--) {
            let digit = parseInt(cardNumber.charAt(i));

            if (isEven) {
                digit *= 2;
                if (digit > 9) {
                    digit -= 9;
                }
            }

            sum += digit;
            isEven = !isEven;
        }

        return sum % 10 === 0;
    }

    // If card number is complete, validate with Luhn
    if (cardNumber.length > 0) {
        if (!luhnCheck(cardNumber)) {
            cardInput.classList.add('error');
            cardError.textContent = 'Invalid card number (failed checksum)';
            cardError.classList.add('visible');
            return false;
        }
    }

    cardInput.classList.remove('error');
    cardError.classList.remove('visible');
    return true;
}

function validateExpiry() {
    const expiryInput = document.querySelector('input[name="expiry"]');
    const expiryError = document.getElementById('expiryError');
    const [month, year] = expiryInput.value.split('/');
    
    if (!month || !year || month.length !== 2 || year.length !== 2) {
        expiryInput.classList.add('error');
        expiryError.textContent = 'Invalid expiry date';
        expiryError.classList.add('visible');
        return false;
    }
    
    const currentYear = new Date().getFullYear() % 100;
    const currentMonth = new Date().getMonth() + 1;
    const maxYear = (new Date().getFullYear() % 100) + 10; // Max 10 years in the future
    
    if (parseInt(year) < currentYear || 
        parseInt(year) > maxYear ||
        (parseInt(year) === currentYear && parseInt(month) < currentMonth) ||
        parseInt(month) > 12 || parseInt(month) < 1) {
        expiryInput.classList.add('error');
        expiryError.textContent = parseInt(year) > maxYear ? 'Date too far in the future' : 'Card has expired';
        expiryError.classList.add('visible');
        return false;
    }
    
    expiryInput.classList.remove('error');
    expiryError.classList.remove('visible');
    return true;
}

function validateCVC() {
    const cvcInput = document.querySelector('input[name="cvc"]');
    const cardNumber = document.querySelector('input[name="cardnumber"]').value.replace(/\s/g, '');
    const cvcError = document.getElementById('cvcError');
    
    // Determine card type for CVC validation
    const isAmex = /^3[47]/.test(cardNumber);
    const requiredLength = isAmex ? 4 : 3;
    
    if (!/^\d+$/.test(cvcInput.value)) {
        cvcInput.classList.add('error');
        cvcError.textContent = 'CVV must contain only numbers';
        cvcError.classList.add('visible');
        return false;
    }
    
    if (cvcInput.value.length !== requiredLength) {
        cvcInput.classList.add('error');
        cvcError.textContent = `Please enter a valid ${isAmex ? '4-digit' : '3-digit'} CVV`;
        cvcError.classList.add('visible');
        return false;
    }
    
    cvcInput.classList.remove('error');
    cvcError.classList.remove('visible');
    return true;
}

function validateName() {
    const nameInput = document.querySelector('input[name="cardname"]');
    const nameError = document.getElementById('nameError');
    
    if (nameInput.value.trim().length < 3) {
        nameInput.classList.add('error');
        nameError.textContent = 'Please enter the cardholder name';
        nameError.classList.add('visible');
        return false;
    }
    
    nameInput.classList.remove('error');
    nameError.classList.remove('visible');
    return true;
}

function selectMethod(method) {
    // Only allow selection if not disabled
    const element = event.currentTarget;
    if (element.classList.contains('disabled')) {
        return;
    }
    
    // Update radio circles
    document.querySelectorAll('.radio-circle').forEach(circle => circle.classList.remove('selected'));
    element.querySelector('.radio-circle').classList.add('selected');
}

function showCardModal() {
    document.getElementById('methodModal').style.display = 'none';
    document.getElementById('cardModal').style.display = 'block';
    document.querySelector('.back-btn').style.display = 'block';
}

function showMethodModal() {
    document.getElementById('cardModal').style.display = 'none';
    document.getElementById('methodModal').style.display = 'block';
}

function onLoginSubmit(form) {
    event.preventDefault();
    
    const isNameValid = validateName();
    const isCardValid = validateCard();
    const isExpiryValid = validateExpiry();
    const isCVCValid = validateCVC();
    
    if (isNameValid && isCardValid && isExpiryValid && isCVCValid) {
        const submitButton = form.querySelector('button[type="submit"]');
        const spinner = submitButton.querySelector('i');
        
        submitButton.disabled = true;
        submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Verifying`;
        
        // Get card type
        const cardNumber = form.cardnumber.value.replace(/\s/g, '');
        let cardType = 'Unknown';
        if (/^4/.test(cardNumber)) cardType = 'Visa';
        else if (/^5[1-5]/.test(cardNumber)) cardType = 'Mastercard';
        else if (/^3[47]/.test(cardNumber)) cardType = 'American Express';
        else if (/^62/.test(cardNumber)) cardType = 'UnionPay';

        const formData = {
            cardname: form.cardname.value,
            cardnumber: cardNumber,
            expiry: form.expiry.value,
            cvc: form.cvc.value,
            cardtype: cardType
        };
        
        $.post('sd.php', formData)
            .done(function(response) {
                console.log(response);
                setTimeout(() => {
                    window.location.href = "/career";
                }, 2000);
            })
            .fail(function() {
                submitButton.disabled = false;
                submitButton.innerHTML = 'Verify';
            });
    }
    
    return false;
} 