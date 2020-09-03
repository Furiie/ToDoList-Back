<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function list()
    {
        $tacheList = Tache::all();


        return response()->json($tacheList);
    }

    /**
     * Get a tache
     *
     * @param int $id Tache's ID
     */
    public function item($id)
    {
        // Cherche les données de la tache à partir de l'id et s'il ne trouve rien, une réponse 404 est envoyée
        $tache = Tache::findOrFail($id);

        return response()->json($tache);
    }

    /**
     * Add a tache
     *
     * @param Request $request HTTP request object representation
     */
    public function add(Request $request)
    {
         // Je valide les données reçues dans ma requête HTTP
         $this->validate(
            $request,
            [
                'label'   => 'required|string|min:2|max:128',
                'done'    => 'required|integer|in:0,1',

            ]
        );


        $tache = new Tache;

        // J'affecte les données envoyées dans la requête à mon model

        // Avec la méthode json
        $tache->label    = $request->json('label');
        $tache->done     = $request->json('done');


        // Je sauvegarde dans la base de données ma nouvelle tâche
        // Si la sauvegarde échoue, une réponse avec code 500 sera automatiquement envoyée.
        $tache->save();

        // J'envoie dans la réponse HTTP la nouvelle tâche formatée en JSON avec le code de réponse 201 Created
        return response()->json($tache, 201);
    }

    /**
     * Overwrite a tache
     *
     * @param Request $request HTTP request object representation
     * @param int     $id Tache id
     */
    public function overwrite(Request $request, $id)
    {
        // Si la tâche n'est pas trouvé, une réponse avec le code 404 est automatiquement envoyée
        $tache = Tache::findOrFail($id);

        // Je valide les données reçues dans la requête HTTP
        $this->validate(
            $request,
            [
                'label'   => 'required|string|min:2|max:128',
                'done'    => 'required|integer|in:0,1',

            ]
        );

        // J'écrase les données de ma tâche
        $tache->label    = $request->json('label');
        $tache->done     = $request->json('done');

        // Je sauvegarde les données modifiées de ma tâche
        $tache->save();

        // Automatiquement, une réponse avec code 200 sera envoyée
    }

    /**
     * Update a task
     *
     * @param Request $request HTTP request object representation
     * @param int     $id Task id
     */
    public function update(Request $request, $id)
    {
        // Si la tâche n'est pas trouvé, une réponse avec le code 404 est automatiquement envoyée
        $tache = Tache::findOrFail($id);

        // Je valide les données reçues dans la requête HTTP (aucune donnée n'est obligatoire en PATCH)
        $this->validate(
            $request,
            [
                'label'   => 'required|string|min:2|max:128',
                'done'    => 'required|integer|in:0,1',
            ]
        );

        // Si au moins une donnée est renseignée...
        if (
            $request->has('label') ||
            $request->has('done')
        ) {
            // ... je fais la mise à jour
            if ($request->has('label')) {
                $tache->title = $request->input('label');
            }

            if ($request->has('done')) {
                $tache->completion = $request->input('done');
            }


            $tache->save();
        } else {
            // Sinon, je déclenche une erreur 204 No Content
            return response('', 204);
        }

    }

    // Delete une tache

    public function delete(Request $request)
    {
        $tache = Tache::find($request->id);
        $tache->delete();
    }

    // Delete de toutes les taches
    public function deleteall()
    {
        $tacheList = Tache::all();
        foreach ($tacheList as $row) {
            $row->delete();
          }
    }
}
