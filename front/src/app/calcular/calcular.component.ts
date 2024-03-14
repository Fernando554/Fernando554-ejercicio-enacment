import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-calcular',
  templateUrl: './calcular.component.html',
  styleUrls: ['./calcular.component.scss']
})
export class CalcularComponent implements OnInit {
  number!: number;
  result: number[][] = []; // Ahora result es un arreglo de arreglos de números
  constructor(private http: HttpClient) {}
  calcularMultiplos() {
    console.log('Datos a enviar:', { number: this.number }); // Imprime los datos a enviar en la consola
    this.http.post<any>('http://localhost:8000/calcular', { number: this.number })
      .subscribe(response => {
        console.log('Respuesta del servidor:', response); // Imprime la respuesta del servidor en la consola
        // Asigna los valores de response a this.result
        this.result = Object.values(response) || [];
    
        // Guardar los resultados en la base de datos
        this.guardarResultados(this.number, this.result);
      });
  }
  guardarResultados(number: number, result: number[][]) {
    console.log('result:', result); // Imprime los resultados en la consola
  
    this.http.post('http://localhost:8000/guardar', { number: number, result: result })
      .subscribe(response => {
        console.log(response); // Imprime la respuesta del backend en la consola
      });
  }

  getCssClass(baseNumber: number): string {
    if (baseNumber % 3 === 0) {
      return 'green';
    } else if (baseNumber % 5 === 0) {
      return 'red';
    } else if (baseNumber % 7 === 0) {
      return 'blue';
    } else {
      return 'default';
    }
  }
  ngOnInit(): void {
  }

}
