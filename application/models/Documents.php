<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Model {

public function update_user_documents($user_id, $documents) {
    // Get the user's current document choices from the database
    $current_documents = $this->get_user_documents($user_id);

    // If there are no current documents, all selected documents are considered new selections
    if (empty($current_documents)) {
        foreach ($documents as $document) {
            $data = array(
                'user_id' => $user_id,
                'document_name' => $document
            );
            $this->db->insert('user_documents', $data);
        }
    } else {
        // Compare current selection with the previous selection
        $selected_documents = array();
        foreach ($documents as $document) {
            if (!in_array($document, $current_documents)) {
                // If a document is selected but not in the current documents, it's a new selection
                $selected_documents[] = $document;
            }
        }

        // Remove documents that are deselected
        $removed_documents = array_diff($current_documents, $documents);

        // Insert new selections into the database
        foreach ($selected_documents as $document) {
            $data = array(
                'user_id' => $user_id,
                'document_name' => $document
            );
            $this->db->insert('user_documents', $data);
        }

        // Remove deselected documents from the database
        if (!empty($removed_documents)) {
            $this->db->where('user_id', $user_id);
            $this->db->where_in('document_name', $removed_documents);
            $this->db->delete('user_documents');
        }
    }
}

    
    public function get_user_documents($user_id) {
        $this->db->select('document_name');
        $this->db->from('user_documents');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        
        $documents = array();
        foreach ($result as $row) {
            $documents[] = $row['document_name'];
        }
        
        return $documents;
    }
}
