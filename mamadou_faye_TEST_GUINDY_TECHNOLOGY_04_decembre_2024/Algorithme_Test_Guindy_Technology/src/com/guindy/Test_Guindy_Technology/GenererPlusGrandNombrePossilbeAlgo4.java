package com.guindy.Test_Guindy_Technology;

import java.util.Arrays;
import java.util.Collections;

public class GenererPlusGrandNombrePossilbeAlgo4 {
    public static void main(String[] args) {
       
        Integer[] arr = {8, 6, 0, 4, 6, 4, 2, 7};
        String result = genereNomber(arr);
        System.out.println("Le plus grand nombre est : " + result);
    }

    // Fonction pour générer le plus grand nombre possible à partir du tableau
    public static String genereNomber(Integer[] arr) {
        Arrays.sort(arr, Collections.reverseOrder());

        StringBuilder nombre_le_plus_grand = new StringBuilder();
        for (int nombre : arr) {
        	nombre_le_plus_grand.append(nombre);
        }

        // Retourner le nombre en chaîne de caractères
        return nombre_le_plus_grand.toString();
    }
}
