var alerts = document.querySelectorAll('.alert')
    if (alerts.length > 0){
        setTimeout(() => {
            for (let alert of alerts) {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }
        }, 3000);
    }
