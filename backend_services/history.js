
/*
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
  console.log(historyData);*/
  
  //const user = 'glenda';
  var historyData;

  const request = new XMLHttpRequest();

  request.onreadystatechange = function(){
      if(this.readyState ==4 && this.status==200){
         historyData  = JSON.parse(this.responseText).userhistory ;
          //console.log(historyData);
          createHistoryList(historyData);
           
        /*
        for (let i = 0; i<results.length;i++){
          let name= results[i].gigName;
           let date= results[i].gigStartDate;
           let status= results[i].gigStatus;
           let details= results[i].bookeraddress;
           historyData.push({name, date, status,details});
           
        }*/
        //console.log(historyData);

      }
  }
  
  request.open("GET","../Main/getUserHistory.php",true);
  request.send();

  console.log(historyData);

const historyList = document.querySelector('.history-list');
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


function createHistoryInfo(name, date,status,details,address) {
    const historyInfo = document.createElement('div');
    historyInfo.className = 'historyinfo';
  
    const historyTitle = document.createElement('p');
    historyTitle.className = 'historytitle';
    historyTitle.innerHTML = name;
  
    const historyDate = document.createElement('p');
    historyDate.className = 'historydate';
    historyDate.innerHTML = date;
  
    const historyDetailsBtn = document.createElement('button');
    historyDetailsBtn.className = 'historydetailsbtn btn btn-warning';
    historyDetailsBtn.setAttribute("onclick",`showDetails("${name}","${date}","${status}","${details}","${address}")`);
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
       
        console.log(historyData[i]);
        const { gigName, gigStartDate, gigStatus, gigDescription, bookeraddress } = historyData[i];
        
        const history = document.createElement('div');
        history.className = 'history';

        const historyIconBackground = createHistoryIconBackground(gigStatus);

        const historyInfo = createHistoryInfo(gigName, gigStartDate, gigStatus,gigDescription, bookeraddress);
        console.log(historyInfo);
        const historyStatus = document.createElement('div');
        
        if (gigStatus == "Active") {
            historyStatus.className = 'historystatus badge badge-pill badge-success';
        } else {
            historyStatus.className = 'historystatus badge badge-pill badge-secondary';
        }
        historyStatus.innerHTML = gigStatus;


        history.appendChild(historyIconBackground);
        history.appendChild(historyInfo);
        history.appendChild(historyStatus);
        historyList.appendChild(history);


    }
}

function createSearchResults(q) {
    const input = q.target.value.toLowerCase().replace(/\s/g, '');

    const results = historyData.filter((history) => {
      const historyName = history.gigName
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

  function showDetails(title, date, status, details,address){
    
    const modalHeader = document.getElementById("modalTitle");
    modalHeader.innerText = title;

    const modalBody = document.getElementById("modalDetails");
    modalBody.innerHTML = `<p>${details} @ ${address}</p>`;
  }




