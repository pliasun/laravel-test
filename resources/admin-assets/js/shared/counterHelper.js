function countUpdate(kind, localCounterId) {
  const counters    = document.querySelectorAll('.js-num');
  const current     = Number(counters[0].innerText);
  const alerts      = document.querySelector('.dropdown-alerts');
  let   newNum      = 0;
  
  if (alerts) {
    alerts.parentNode.removeChild(alerts);
  }
  
  const localCounter        = document.querySelector(`#${localCounterId}`);
  let   localCounterCurrent = '';
  let   newLocalNum         = 0;

  if (localCounter) {
    localCounterCurrent = Number(localCounter.innerText);
  }

  if (kind === 'plus') {
    newNum = current + 1;
    if (localCounter) {
      newLocalNum = localCounterCurrent + 1;
    }
  } else {
    newNum = current - 1;
    if (localCounter) {
      newLocalNum = localCounterCurrent - 1;
    }
  }

  if (newNum === 0) {
    newNum = '';
  } 
  if (newLocalNum === 0) {
    newLocalNum = '';
  } 

  counters.forEach(counter => {
    counter.innerText = newNum;
  });
  
  if (localCounter) {
    localCounter.innerText = newLocalNum;
  }
}

export { countUpdate };