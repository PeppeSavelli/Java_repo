import java.util.Scanner;

public class Calcolatrice {
    public static double somma(double a, double b) {
        double somma = a + b;
        return somma;
    }

    public static double sottrazione(double a, double b) {
        double sottrazione = a - b;
        return sottrazione;
    }

    public static double moltiplicazione(double a, double b) {
        double moltiplicazione = a * b;
        return moltiplicazione;
    }

    public static double divisione(double a, double b) {
        double divisione = a / b;
        return divisione;
    }

    public static void main(String[] args) {
        int scelta;
        Scanner scanner = new Scanner(System.in);
                do{
                System.out.println("Benvenuto nella calcolatrice");
                System.out.println("1. Somma");
                System.out.println("2. Sottrazione");
                System.out.println("3. Moltiplicazione");
                System.out.println("4. Divisione");
                System.out.println("5. Esci");
                System.out.print("Scegli un'operazione (1-5):");
                scelta = scanner.nextInt();
                if (scelta == 1) {
                    System.out.print("Inserisci il primo numero:");
                    double a = scanner.nextDouble();
                    System.out.print("Inserisci il secondo numero:");
                    double b = scanner.nextDouble();
                    System.out.println("Il risultato è: " + Calcolatrice.somma(a, b));
                } else if (scelta == 2) {
                    System.out.print("Inserisci il primo numero:");
                    double a = scanner.nextDouble();
                    System.out.print("Inserisci il secondo numero:");
                    double b = scanner.nextDouble();
                    System.out.println("Il risultato è: " + Calcolatrice.sottrazione(a, b));
                } else if (scelta == 3) {
                    System.out.print("Inserisci il primo numero:");
                    double a = scanner.nextDouble();
                    System.out.print("Inserisci il secondo numero:");
                    double b = scanner.nextDouble();
                    System.out.println("Il risultato è: " + Calcolatrice.moltiplicazione(a, b));
                } else if (scelta == 4) {
                    System.out.print("Inserisci il primo numero:");
                    double a = scanner.nextDouble();
                    System.out.print("Inserisci il secondo numero:");
                    double b = scanner.nextDouble();
                    System.out.println("Il risultato è: " + Calcolatrice.divisione(a, b));
                } else if (scelta == 5) {
                    System.out.println("Sei uscito dalla calcolatrice... Grazie per averci scelto!");
                }
            }while(scelta!=5);
    }
}