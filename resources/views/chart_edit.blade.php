<style>
    body {
    font-family: Arial, sans-serif;
    background: url('images/ban1.jpg') no-repeat center center fixed;
    background-size: cover;
    padding: 30px;
    padding-top: 100px;
    color: #fff;
}

h3 {
    text-align: center;
    margin-bottom: 10px;
    font-size: 1.4rem;
    color: #ffd700; /* golden title */
    text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
}

.chart-wrap {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
    justify-content: center;
}

.chart {
    --cell: 90px;
    display: grid;
    grid-template-columns: repeat(4, var(--cell));
    grid-template-rows: repeat(4, var(--cell));
    grid-template-areas:
        "h1  h2  h3  h4"
        "h12 c1  c2  h5"
        "h11 c3  c4  h6"
        "h10 h9  h8  h7";
    gap: 3px;
    padding: 8px;
    border-radius: 15px;
    border: 2px solid #ffcc00;
    background: linear-gradient(135deg, #222, #444);
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* House style */
.house {
    border-radius: 10px;
    position: relative;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* Colorful houses */
.house:nth-child(1) { background: #ffcccc; }
.house:nth-child(2) { background: #ffe0b3; }
.house:nth-child(3) { background: #fff2b3; }
.house:nth-child(4) { background: #e6ffb3; }
.house:nth-child(5) { background: #b3ffd9; }
.house:nth-child(6) { background: #b3e0ff; }
.house:nth-child(7) { background: #d1b3ff; }
.house:nth-child(8) { background: #ffb3e6; }
.house:nth-child(9) { background: #ffd9b3; }
.house:nth-child(10){ background: #c2f0c2; }
.house:nth-child(11){ background: #cce6ff; }
.house:nth-child(12){ background: #f2ccff; }

.house:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(0,0,0,0.4);
}

/* Small number */
.house small {
    position: absolute;
    top: 6px;
    left: 8px;
    font-size: 0.75rem;
    font-weight: bold;
    color: #333;
    opacity: 0.8;
}

/* Textarea styling */
.house textarea {
    flex: 1;
    margin-top: 18px;
    border: none;
    outline: none;
    resize: none;
    font-size: 0.85rem;
    padding: 6px;
    background: transparent;
    color: #222;
    font-weight: bold;
}

/* Center area */
.center {
    grid-column: 2 / 4;
    grid-row: 2 / 4;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: linear-gradient(135deg, #ffcc00, #ff6600);
    font-weight: bold;
    font-size: 1.2rem;
    color: #fff;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}

</style>
</head>

<body>

    <div class="chart-wrap">

        <!-- Rasi Chart -->
        <div>
            <h3 style="text-align:center;">Rasi</h3>
            <div class="chart">
                <div class="house h1"><small>1</small><textarea></textarea></div>
                <div class="house h2"><small>2</small><textarea></textarea></div>
                <div class="house h3"><small>3</small><textarea></textarea></div>
                <div class="house h4"><small>4</small><textarea></textarea></div>
                <div class="house h5"><small>5</small><textarea></textarea></div>
                <div class="house h6"><small>6</small><textarea></textarea></div>
                <div class="house h7"><small>7</small><textarea></textarea></div>
                <div class="house h8"><small>8</small><textarea></textarea></div>
                <div class="house h9"><small>9</small><textarea></textarea></div>
                <div class="house h10"><small>10</small><textarea></textarea></div>
                <div class="house h11"><small>11</small><textarea></textarea></div>
                <div class="house h12"><small>12</small><textarea></textarea></div>
                <div class="center">Rasi</div>
            </div>
        </div>

        <!-- Navamsa Chart -->
        <div>
            <h3 style="text-align:center;">Navamsa</h3>
            <div class="chart">
                <div class="house h1"><small>1</small><textarea></textarea></div>
                <div class="house h2"><small>2</small><textarea></textarea></div>
                <div class="house h3"><small>3</small><textarea></textarea></div>
                <div class="house h4"><small>4</small><textarea></textarea></div>
                <div class="house h5"><small>5</small><textarea></textarea></div>
                <div class="house h6"><small>6</small><textarea></textarea></div>
                <div class="house h7"><small>7</small><textarea></textarea></div>
                <div class="house h8"><small>8</small><textarea></textarea></div>
                <div class="house h9"><small>9</small><textarea></textarea></div>
                <div class="house h10"><small>10</small><textarea></textarea></div>
                <div class="house h11"><small>11</small><textarea></textarea></div>
                <div class="house h12"><small>12</small><textarea></textarea></div>
                <div class="center">Navamsa</div>
            </div>
        </div>

    </div>