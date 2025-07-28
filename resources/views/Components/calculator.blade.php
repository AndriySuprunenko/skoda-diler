<div class="max-w-xl mx-auto mt-10">
    <div class="mb-4">
        <label for="car_model" class="block  text-skoda-emerald-green font-semibold mb-2">Модель
            авто:</label>
        <select id="car_model"
            class="appearance-none w-full border border-gray-300 bg-skoda-white text-skoda-emerald-green rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:skoda-emerald-green">
            <option value="Skoda Octavia" data-price="1148648">Skoda Octavia</option>
            <option value="Skoda Kodiaq" data-price="1680112">Skoda Kodiaq</option>
            <option value="Skoda Superb" data-price="1621822">Skoda Superb</option>
            <option value="Skoda Kamiq" data-price="936405">Skoda Kamiq</option>
            <option value="Skoda Scala" data-price="896159">Skoda Scala</option>
            <option value="Skoda Fabia" data-price="754250">Skoda Fabia</option>
            <option value="Skoda Karoq" data-price="1271956">Skoda Karoq</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="advance_percent" class="block text-skoda-emerald-green font-semibold mb-2">Аванс (%):</label>
        <select id="advance_percent"
            class="appearance-none w-full border bg-skoda-white border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:skoda-emerald-green">
            <option value="0">0%</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
            <option value="40">40%</option>
            <option value="50">50%</option>
            <option value="60">60%</option>
            <option value="70">70%</option>
            <option value="80">80%</option>
        </select>
    </div>

    <div class="mb-8">
        <label for="months" class="block text-skoda-emerald-green font-semibold mb-2">Кількість років:</label>
        <select id="months"
            class="appearance-none w-full border bg-skoda-white border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:skoda-emerald-green">
            <option value="12">1 рік</option>
            <option value="24">2 роки</option>
            <option value="36">3 роки</option>
            <option value="48">4 роки</option>
            <option value="60">5 років</option>
            <option value="72">6 років</option>
            <option value="84">7 років</option>
        </select>
    </div>

    <x-button style="emerald" onclick="calculate()">Розрахувати</x-button>

    <div id="result" class="mt-6 text-center text-lg text-skoda-emerald-green font-medium"></div>
</div>

<script>
    function calculate() {
        const carModel = document.getElementById('car_model');
        const price = parseFloat(carModel.selectedOptions[0].getAttribute('data-price'));
        const advancePercent = parseFloat(document.getElementById('advance_percent').value);
        const advance = (price * advancePercent / 100);
        const months = parseInt(document.getElementById('months').value);

        if (isNaN(advance) || isNaN(months) || advance >= price) {
            document.getElementById('result').innerHTML = "<div class='text-red-600'>Перевірте введені дані</div>";
            return;
        }

        const creditSum = price - advance;
        const monthlyPayment = (creditSum / months).toFixed(2);

        document.getElementById('result').innerHTML = `
            Аванс: <strong>${advance.toFixed(2)} грн</strong><br>
            Щомісячний платіж: <strong>${monthlyPayment} грн</strong>
        `;
    }
</script>
