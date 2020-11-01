

const historyData = [
    {
      name: 'Help me buy coffee',
      date: 'Tuesday, January 21',
      status: 'Active',
      details: 'Testing'
    },
    {
      name: 'Help me walk my dog',
      date: 'Friday, January 17',
      status: 'Completed',
      details: 'Testing2'
    },
    {
      name: 'Dunkin Donuts Breakfast Sandwich',
      date: 'Monday, January 6',
      status: 'Cancelled',
      details: 'Testing3'
    },
  ];

const historyList = document.querySelector('.history-list');
createHistoryList(historyData);
const searchInputBox = document.querySelector('.search__input-box');
searchInputBox.addEventListener('keyup', createSearchResults);

function createIcon(icon) {
    const historyIcon = document.createElement('span');
  
    switch (icon) {
      case 'Active':
        historyIcon.className = 'iconify status_icon';
        historyIcon.setAttribute('data-inline', 'false');
        historyIcon.setAttribute('data-icon', 'ic:round-pending');
        break;
      case 'Completed':
        historyIcon.className ='iconify status_icon';
        historyIcon.setAttribute('data-inline', 'false');
        historyIcon.setAttribute('data-icon', 'ion:checkmark-done-circle');
        break;
      case 'Cancelled':
        historyIcon.className = 'iconify status_icon';
        historyIcon.setAttribute('data-inline', 'false');
        historyIcon.setAttribute('data-icon', 'ic:round-cancel');
        break;
      default:
    }
  
    return historyIcon;
  }

function createHistoryIconBackground(icon) {
const historyIconBackground = document.createElement('div');

const historyIcon = createIcon(icon);

historyIconBackground.appendChild(historyIcon);
return historyIconBackground;
}


function createHistoryInfo(name, date,status,details) {
    const historyInfo = document.createElement('div');
    historyInfo.className = 'historyinfo';
  
    const historyTitle = document.createElement('p');
    historyTitle.className = 'historytitle';
    historyTitle.innerHTML = name;
  
    const historyDate = document.createElement('p');
    historyDate.className = 'historydate';
    historyDate.innerHTML = date;
  
    const historyDetailsBtn = document.createElement('button');
    historyDetailsBtn.className = 'historydetailsbtn';
    historyDetailsBtn.setAttribute("onclick",`showDetails("${name}","${date}","${status}","${details}")`);
    historyDetailsBtn.setAttribute("data-toggle","modal");
    historyDetailsBtn.setAttribute("data-target","#historyDetail");
    historyDetailsBtn.innerHTML = 'Details';
  
    historyInfo.appendChild(historyTitle);
    historyInfo.appendChild(historyDate);
    historyInfo.appendChild(historyDetailsBtn);
    return historyInfo;
  }

function createHistoryList(historyData) {
    historyList.innerHTML = '';
    for (let i = 0; i < historyData.length; i++) {
        const { name, date, status, details } = historyData[i];
        const history = document.createElement('div');
        history.className = 'history';

        const historyIconBackground = createHistoryIconBackground(status);

        const historyInfo = createHistoryInfo(name, date,status,details);

        const historyStatus = document.createElement('div');
        
        if (status == "Active") {
            historyStatus.className = 'historystatus badge badge-pill badge-success';
        } else {
            historyStatus.className = 'historystatus badge badge-pill badge-secondary';
        }
        historyStatus.innerHTML = status;


        history.appendChild(historyIconBackground);
        history.appendChild(historyInfo);
        history.appendChild(historyStatus);
        historyList.appendChild(history);
    }
}

function createSearchResults(q) {
    const input = q.target.value.toLowerCase().replace(/\s/g, '');

    const results = historyData.filter((history) => {
      const historyName = history.name
        .toLowerCase()
        .replace(/\s/g, '')
        .slice(0, input.length);
      return input === historyName;
    });
    if (input === '') {
        createHistoryList(historyData);
    } else if (hasHistoryListChanged(results)) {
        createHistoryList(results);
    }
  }

  function hasHistoryListChanged(histArr) {
    const historyNameList = histArr
      .map((history) => history.name)
      .join('');
    const currentTitleDivs = document.querySelectorAll(
      '.historytitle',
    );
    const currentTitles = [];
    for (let i = 0; i < currentTitleDivs.length; i++) {
        currentTitles.push(currentTitleDivs[i].innerText);
    }
    return currentTitles.join('') !== historyNameList;
  }

  function showDetails(title, date, status, details){
    
    const modalHeader = document.getElementById("modalTitle");
    modalHeader.innerText = title;

    const modalBody = document.getElementById("modalDetails");
    modalBody.innerText = details;
  }




