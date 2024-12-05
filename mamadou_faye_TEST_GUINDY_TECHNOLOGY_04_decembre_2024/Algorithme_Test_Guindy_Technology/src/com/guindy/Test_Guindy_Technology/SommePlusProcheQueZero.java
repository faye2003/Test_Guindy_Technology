package com.guindy.Test_Guindy_Technology;


import java.util.Arrays;

public class SommePlusProcheQueZero {
    public static void main(String[] args) {
        int[] tab = {1, 60, -10, 70, -80, 85};
        trouverPairPlusProcheQueZero(tab);
    }

    // Fonction pour trouver les deux éléments dont la somme est la plus proche de zéro
    public static void trouverPairPlusProcheQueZero(int[] tab) {
     
        Arrays.sort(tab);

        int gauche = 0;
        int droite = tab.length - 1;

        int versLaGauche = gauche;
        int versLaDroite = droite;
        int somme = Integer.MAX_VALUE;  

        while (gauche < droite) {
            int sum = tab[gauche] + tab[droite];

            if (Math.abs(sum) < Math.abs(somme)) {
                somme = sum;
                versLaGauche = gauche;
                versLaDroite = droite;
            }

            if (sum < 0) {
                gauche++;
            }
            else {
                droite--;
            }
        }

        // Afficher les deux éléments dont la somme est la plus proche de zéro
        System.out.println("Les duux éléments dont la somme est la plus proche ed zéro sont : " 
                            + tab[versLaGauche] + " et " + tab[versLaDroite]);
    }
}
