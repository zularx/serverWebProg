<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab4</title>
    <link rel="stylesheet" href="src/output.css">
    <script src="static/scripts/calcInput.js" defer></script>
</head>
<body class="bg-[#eeeeee]">
    <header class="w-full h-30 flex items-center justify-between p-5">
        <img src="https://rkmo.ru/wp-content/uploads/2022/01/2-1.png" alt="лого" class="w-50">
        <p class="mx-auto font-semibold text-xl">Домашняя работа 4: Calculator</p>
    </header>
    <main class="w-full min-h-165 flex justify-center items-center">
            <div class="bg-white w-75 h-110 rounded-xl flex flex-col items-center z-2">
                <p id="answPar" class="w-70 h-15 border-4 border-[#565656] rounded-xl my-4 text-right p-2 text-3xl overflow-x-auto text-nowrap">0</p>
                <div class="flex gap-2 justify-center">
                    <div class="grid grid-cols-3 w-fit gap-2">
                        <button id="moreOptsBtn" class="w-15 h-15 bg-[#5e5e5e] text-white cursor-pointer rounded-xl flex items-center justify-center hover:bg-[#494949] active:bg-[#5e5e5e] transition-colors duration-100">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="5" cy="12" r="2"/>
                                <circle cx="12" cy="12" r="2"/>
                                <circle cx="19" cy="12" r="2"/>
                            </svg>
                        </button>
                        <button id="clearAllBtn" class="w-15 h-15 bg-[#5e5e5e] text-white cursor-pointer rounded-xl hover:bg-[#494949] active:bg-[#5e5e5e] transition-colors duration-100">
                            AC
                        </button>
                        <button id="clearLastSymbBtn" class="w-15 h-15 bg-[#5e5e5e] text-white cursor-pointer rounded-xl flex items-center justify-center hover:bg-[#494949] active:bg-[#5e5e5e] transition-colors duration-100">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22 3H8c-.6 0-1.1.3-1.4.8L1 12l5.6 8.2c.3.5.8.8 1.4.8h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H8.2L3.4 12 8.2 5H22v14z"/>
                                <path d="M15.4 9l-1.4 1.4L12.6 9 11.2 10.4 13 12.2l-1.8 1.8 1.4 1.4 1.8-1.8 1.8 1.8 1.4-1.4-1.8-1.8 1.8-1.8z"/>
                            </svg>
                        </button>
                        <button id="sevenBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            7
                        </button>
                        <button id="eightBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            8
                        </button>
                        <button id="nineBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            9
                        </button>
                        <button id="fourBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            4
                        </button>
                        <button id="fiveBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            5
                        </button>
                        <button id="sixBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            6
                        </button>
                        <button id="oneBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            1
                        </button>
                        <button id="twoBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            2
                        </button>
                        <button id="threeBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            3
                        </button>
                        <button id="closeParBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            )
                        </button>
                        <button id="zeroBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            0
                        </button>
                        <button id="openParBtn" class="w-15 h-15 bg-[#2a2a2a] text-white cursor-pointer rounded-xl hover:bg-[#7c7c7c] active:bg-[#2a2a2a] transition-colors duration-100">
                            (
                        </button>
                    </div>
                    <div class="flex flex-col gap-2">
                        <button id="plusBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                            +
                        </button>
                        <button id="minusBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                            -
                        </button>
                        <button id="divBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                            /
                        </button>
                        <button id="mulBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                            *
                        </button>
                        <button id="answBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                            =
                        </button>
                    </div>
                </div>
            </div>
            <div id="otherOptionsPanel" class="bg-white w-40 h-110 rounded-xl flex justify-center items-center ml-2 z-1 absolute translate-x-17.5 transition-transform duration-200">
                <div class="grid grid-cols-2 gap-2 w-32">
                    <button id="expBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        **
                    </button>
                    <button id="rootBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        √
                    </button>
                    <button id="lnBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        ln
                    </button>
                    <button id="logBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        log
                    </button>
                    <button id="piBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        π
                    </button>
                    <button id="eBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        e
                    </button>
                    <button id="factBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        !
                    </button>
                    <button id="dotBtn" class="w-15 h-15 bg-[#e36a00] text-white cursor-pointer rounded-xl hover:bg-[#fa851e] active:bg-[#e36a00] transition-colors duration-100">
                        .
                    </button>
                </div>
            </div>
    </main>
    <footer class="bg-[#2a2a2a] w-full h-30 flex justify-center items-center text-white p-10">
        <p class="text-white text-xl">Задание для самостоятельной работы "Calculator" — Словецких</p>
    </footer>
</body>
</html>