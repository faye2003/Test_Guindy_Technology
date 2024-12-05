package com.guindy.Test_Guindy_Technology;

import java.util.Arrays;
import java.util.Scanner;

public class OrdreCroissant {
    public static void main(String[] args) {
        int n = getUserInput();
        
        String result = separeChar(n);
        System.out.println("Le nombre trié est : " + result);
    }

    // Function pour demander la saisie nombre à l'utiilsateur
    public static int getUserInput() {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Veuillez entrer un nombre entier : ");
        return scanner.nextInt();
    }

    public static String separeChar(int n) {

        String nombre_caractere = Integer.toString(n);

        char[] tab = nombre_caractere.toCharArray();

        // Trier le tableau de caractères
        Arrays.sort(tab);

        StringBuilder nombre_separer_par_virgule = new StringBuilder();
        for (int i = 0; i < tab.length; i++) {
        	nombre_separer_par_virgule.append(tab[i]);
            if (i < tab.length - 1) {
            	nombre_separer_par_virgule.append(",");
            }
        }

        return nombre_separer_par_virgule.toString();
    }
}

