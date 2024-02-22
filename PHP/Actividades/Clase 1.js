let matriz = [
    [1,1,0,1,0],
    [1,1,1,0,0],
    [0,0,0,1,1],
    [1,0,0,0,0],
    [1,1,0,1,0]
];

function dfs(matriz, i, j) {
    if(i<0 || j<0 || i>=matriz.length || j>=matriz[0].length || matriz[i][j]===0) return;
    matriz[i][j] = 0;
    dfs(matriz, i+1, j);
    dfs(matriz, i-1, j);
    dfs(matriz, i, j+1);
    dfs(matriz, i, j-1);
}

function leerMatriz(matriz) {
    let contador = 0;
    for(let i =0; i < matriz.length; i++) {
        for(let j = 0; j < matriz[i].length; j++) {
            if(matriz[i][j] === 1) {
                dfs(matriz, i, j);
                contador++;
            }
        }
    }
    console.log(contador);
}

leerMatriz(matriz);