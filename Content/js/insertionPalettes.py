import json
import psycopg2


def insert_palettes_from_json(json_file, db_config):
    try:
        # Charger les données JSON
        with open(json_file, "r") as file:
            palettes = json.load(file)

        # Connexion à la base de données
        conn = psycopg2.connect(
            host=db_config["host"],
            database=db_config["dbname"],
            user=db_config["user"],
            password=db_config["password"],
            port=db_config.get("port", "5433"),  # Utilise 5432 par défaut
        )
        cursor = conn.cursor()

        # Requêtes d'insertion
        insert_palette_query = (
            "INSERT INTO Palette (Nom_palette) VALUES (%s) ON CONFLICT DO NOTHING"
        )
        insert_couleur_query = "INSERT INTO Couleur (Coloris, Code_hexadecimal) VALUES (%s, %s) ON CONFLICT DO NOTHING"
        insert_est_composee_query = """
            INSERT INTO Est_composee (Id_Couleur, Nom_palette)
            VALUES (
                (SELECT Id_Couleur FROM Couleur WHERE Code_hexadecimal = %s LIMIT 1),
                %s
            ) ON CONFLICT DO NOTHING
        """

        # Parcourir les palettes
        for palette in palettes:
            # Insérer la palette
            cursor.execute(insert_palette_query, (palette["palette_name"],))

            # Parcourir les couleurs
            for color in palette["colors"]:
                # Insérer la couleur
                cursor.execute(insert_couleur_query, (color["color"], color["hex"]))

                # Associer la couleur à la palette
                cursor.execute(
                    insert_est_composee_query, (color["hex"], palette["palette_name"])
                )

        conn.commit()
        print("Données insérées avec succès depuis le fichier JSON !")

    except Exception as e:
        print(f"Erreur : {e}")

    finally:
        if "conn" in locals() and conn:
            cursor.close()
            conn.close()


# Configuration de la base de données
db_config = {
    "host": "localhost",
    "dbname": "sae_s5",
    "user": "postgres",
    "password": "02062004",
    "port": "5433",  # Par défaut, essayez 5432 ou 5433 selon votre configuration
}

json_file = "colors.json"  # Chemin vers le fichier JSON
insert_palettes_from_json(json_file, db_config)
