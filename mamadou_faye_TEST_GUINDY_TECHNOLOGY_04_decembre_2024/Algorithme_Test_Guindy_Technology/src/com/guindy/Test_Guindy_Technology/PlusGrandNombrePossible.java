package com.guindy.Test_Guindy_Technology;

import java.util.Scanner;

public class PlusGrandNombrePossible {
    public static void main(String[] args) {
        // temande l'utilisateur de soisir un nombre
        Scanner scanner = new Scanner(System.in);
        System.out.print("Veuillez entrer un nombre : ");
        String n = scanner.nextLine();

        String result = trouverPlusPetitNombre(n);
        System.out.println("Le plus petit nombre supérieur à " + n + " est : " + result);
    }

    public static String trouverPlusPetitNombre(String n) {
        char[] tab = n.toCharArray();
        int length = tab.length;

        int i;
        for (i = length - 1; i > 0; i--) {
            if (tab[i - 1] < tab[i]) {
                break;
            }
        }

        if (i == 0) {
            return "Pas Possible";
        }
        int x = tab[i - 1];
        int nombre = i;
        for (int j = i + 1; j < length; j++) {
            if (tab[j] > x && tab[j] < tab[nombre]) {
            	nombre = j;
            }
        }

        change(tab, i - 1, nombre);

        reverse(tab, i, length - 1);

        return new String(tab);
    }

    public static void change(char[] arr, int i, int j) {
        char temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }

    public static void reverse(char[] arr, int start, int end) {
        while (start < end) {
            change(arr, start, end);
            start++;
            end--;
        }
    }
}

	

	       
