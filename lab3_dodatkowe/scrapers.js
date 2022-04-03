const puppeteer = require('puppeteer')

function getPosition(string, subString, index) {
    return string.split(subString, index).join(subString).length;
}

async function scrapeProduct(url) {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto(url);

    var result = [];
    for (var i = 1; i <= 11; i++) {
        var max = i == 11 ? 2 : 3;
        for (var j = 1; j <= max; j++) {
            let titleXpath = `//*[@id="search"]/div/div[${i}]/div[${j}]/div/a[3]`;
            let [el] = await page.$x(titleXpath);
            let txt = await el.getProperty('textContent');
            let title = await txt.jsonValue();
            let volume = parseFloat(title.substring(getPosition(title, '/', 2) + 1).replace(',', '.'));

            let priceXpath = `//*[@id="search"]/div/div[${i}]/div[${j}]/div/div[3]/span`;
            let [el2] = await page.$x(priceXpath);
            let txt2 = await el2.getProperty('textContent');
            let price = await txt2.jsonValue();
            price = parseFloat(price.replace(',', '.').replace(' ', ''));

            per_100ml = Math.round(price * 0.1 / volume * 100) / 100;
            result.push({title, price, per_100ml})
        }
    }

    browser.close();
    return result;
}

let result = null
async function run(){
    result = await scrapeProduct('https://sklep-domwhisky.pl/pol_m_World-Whisky_Whiskey-amerykanska_Bourbon-152.html')
    console.log(result)   
}

run()
