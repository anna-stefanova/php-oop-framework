window.onload = function () {
    let btnsBuy = document.querySelectorAll('.addToCart');

    if (btnsBuy) {
        for (let btn of btnsBuy) {
            addToCart(btn);
        }
    }

    let tdCount = document.querySelectorAll('td.count');
    let isAjax = false;
    for (let td of tdCount) {
        let idProduct = td.getAttribute('id_good');
        let btns = td.querySelectorAll('button');
        for (let btn of btns) {
            btn.addEventListener('click', function() {

                let btnValue = btn.getAttribute('value');
                let url = 'index.php?c=cart&act=cart';
                let isAjax = true;
                updateCart(url, idProduct, btnValue, isAjax).catch(error => {
                    error.message; // 'An error has occurred: 404'
                });

                async function updateCart(url, id, value, isAjax) {
                    let option = {
                        method: 'POST',
                        headers:{"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",},
                        body: new URLSearchParams({id_good: id, value: value, isAjax: isAjax}),
                    };
                    let response = await fetch(url, option);
                    if (!response.ok) {
                        const message = `An error has occurred: ${response.status}`;
                        throw new Error(message);
                    }
                    let text = await response.text();


                    if (text) {
                        let obj = JSON.parse(text);

                        const content = document.getElementById('content');
                        for (let key in obj) {

                            if (key === 'goods') {
                                let goods = obj[key];
                                if (goods) {
                                    let total = 0;
                                    let tr = content.querySelectorAll('tr');
                                    let elemId = [];
                                    let goodsId = [];
                                    for (let elem of tr) {

                                        goods.forEach(good => {
                                            if (elem.getAttribute('id_good') === good.id_good) {
                                                total = total + Number(good.common_price);
                                                let input = elem.querySelector('input');
                                                input.value = good.count;
                                                let tdAmount = elem.querySelector('.amount');
                                                tdAmount.innerText = good.common_price;
                                                goodsId.push(good.id_good);
                                            }

                                        });
                                        if (elem.getAttribute('id_good')) elemId.push(elem.getAttribute('id_good'));
                                    }

                                    let removeId = diff(goodsId, elemId);
                                    for (let elem of tr) {
                                        removeId.forEach(id => {
                                            if (elem.getAttribute('id_good') === id) {
                                                elem.remove();
                                            }
                                        });
                                    }

                                    let tdSummary = content.querySelector('.summary');
                                    tdSummary.innerText = total;
                                } else {
                                    let cart = document.getElementById('cart');
                                    cart.innerHTML = '';
                                    let link = document.createElement('a');
                                    link.href = 'index.php?c=good&act=catalog';
                                    link.innerText = 'Вернуться в магазин';
                                    const message = content.querySelector('.message');
                                    message.innerText = obj['message'];
                                    content.append(link);
                                }
                            }
                        }

                    }
                }

            });
        }

    }


};

function diff(a1, a2) {
    return a1.filter(i=>!a2.includes(i))
        .concat(a2.filter(i=>!a1.includes(i)))
}

function addToCart(elem) {
    elem.addEventListener('click', function() {
        let idProduct =elem.getAttribute('id_good');

        let url = 'index.php?c=cart&act=cart';
        sendData(url, idProduct).catch(error => {
            error.message; // 'An error has occurred: 404'
        });
    });
}

async function sendData(url, id) {
    let option = {
        method: 'POST',
        headers:{"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",},
        body: new URLSearchParams({id_good: id}),
    };

    let response = await fetch(url, option);
    if (!response.ok) {
        const message = `An error has occurred: ${response.status}`;
        throw new Error(message);
    }
    let text = await response.text();
    if (text) {
        alert('Товар добавлен в корзину');
    }
}


