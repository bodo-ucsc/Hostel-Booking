<?php

class pagination
{

    public function __construct($page, $limit)
    {

        echo "
 
    const paginationNumbers = document.getElementById('pagination-numbers');
    const paginatedList = document.getElementById('table');
    const listItems = paginatedList.getElementsByClassName('list-items');
    const listItemsActions = document.getElementsByClassName('list-item-action');

    const nextButton = document.getElementById('next-button');
    const prevButton = document.getElementById('prev-button');

    const paginationLimit = '$limit';
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    let currentPage = '$page';


    const disableButton = (button) => {
        button.classList.add('disabled');
        button.setAttribute('disabled', true);
    };

    const enableButton = (button) => {
        button.classList.remove('disabled');
        button.removeAttribute('disabled');
    };

    const handlePageButtonsStatus = () => {
        if (currentPage === 1) {
            disableButton(prevButton);
        } else {
            enableButton(prevButton);
        }

        if (pageCount === currentPage) {
            disableButton(nextButton);
        } else {
            enableButton(nextButton);
        }

    };

    const handleActivePageNumber = () => {
        document.querySelectorAll('.pagination-number').forEach((button) => {
            button.classList.remove('bg-blue','white');
            button.classList.add('bg-white-hover','black');
            const pageIndex = Number(button.getAttribute('page-index'));
            if (pageIndex == currentPage) {
                button.classList.remove('bg-white-hover','black');
                button.classList.add('bg-blue','white');
            }
        });
    };

    const appendPageNumber = (index) => {
        const pageNumber = document.createElement('button');
        pageNumber.className = 'pagination-number bg-white-hover shadow padding-3';
        pageNumber.innerHTML = index;
        pageNumber.setAttribute('page-index', index);
        pageNumber.setAttribute('aria-label', 'Page ' + index);

        paginationNumbers.appendChild(pageNumber);
    };


    const getPaginationNumbers = () => {
        for (let i = 1; i <= pageCount; i++) {
            appendPageNumber(i);
        }
    };

    const setCurrentPage = (pageNum) => {
        currentPage = pageNum;

        handleActivePageNumber();
        handlePageButtonsStatus();

        const prevRange = (pageNum - 1) * paginationLimit;
        const currRange = pageNum * paginationLimit;
 

        for (let i = 0; i < listItemsActions.length; i++) {
            listItemsActions[i].classList.add('display-none');
            listItemsActions[i].classList.remove('row');
            listItems[i].classList.add('display-none');
            listItems[i].classList.remove('hs');
            if (i >= prevRange && i < currRange) {
                listItems[i].classList.add('hs');
                listItems[i].classList.remove('display-none');
                listItemsActions[i].classList.add('row');
                listItemsActions[i].classList.remove('display-none');
            }
        }
    };

    window.addEventListener('load', () => {
        getPaginationNumbers();
        setCurrentPage(1);
        setCurrentPage($page);
        

        prevButton.addEventListener('click', () => {
            setCurrentPage(currentPage - 1);
        });

        nextButton.addEventListener('click', () => {
            setCurrentPage(currentPage + 1);
        });

        document.querySelectorAll('.pagination-number').forEach((button) => {
            const pageIndex = Number(button.getAttribute('page-index'));

            if (pageIndex) {
                button.addEventListener('click', () => {
                    setCurrentPage(pageIndex);
                });
            }
        });
 
    });
    ";
    }

}