<?php
class Constants {

	public static $passwordsDoNoMatch = "Your passwords don't match";
	public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters";
	public static $passwordCharacters = "Your password must be between 5 and 30 characters";
	public static $emailInvalid = "Email is invalid";
	public static $emailsDoNotMatch = "Your emails don't match";
	public static $emailTaken = "This email is already in use";
	public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";
	public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
	public static $usernameCharacters = "Your username must be between 5 and 25 characters";
	public static $usernameTaken = "This username already exists";

	public static $loginFailed = "Your username or password was incorrect";
	
	public static $titleCharacters = "Title must be between 1 and 50 characters";
	public static $artistCharacters = "Artist must be between 1 and 50 characters";
	public static $albumCharacters = "Album must be between 1 and 50 characters";
	public static $transcriptionCharacters = "Transcription must be at least 1 character";
	public static $featuredArtistCharacters = "Featured Artist(s) must be between 1 and 50 characters";
	public static $producerCharacters = "Producer(s) must be between 1 and 50 characters";
	public static $writerCharacters = "Writer(s) must be between 1 and 50 characters";
	public static $engineerCharacters = "Engineer must be between 1 and 50 characters";
	public static $linkCharacters = "Link must be at least 3 characters";
	
	public static $titleDuplicate = "There is a preexisting title";
	public static $artistDuplicate = "There is a preexisting artist";
	public static $albumDuplicate = "There is a preexisting album";
	public static $transcriptionDuplicate = "There is a preexisting transcription";
	public static $genreDuplicate = "There is a preexisting genre";
	public static $featuredArtistDuplicate = "There is a preexisting featured artist(s)";
	public static $producerDuplicate = "There is a preexisting producer(s)";
	public static $writerDuplicate = "There is a preexisting writer(s)";
	public static $engineerDuplicate = "There is a preexisting engineer(s)";

	public static $titleArtistDuplicate = "Title is accounted for with a preexisting artist";
	public static $titleAlbumDuplicate = "Title is accounted for with a preexisting album";
	public static $titleTranscriptionDuplicate = "Title is accounted for with a preexisting transcription";
	//public static $titleGenreDuplicate = "Title is accounted for with a preexisting genre";
	public static $titleFeaturedArtistDuplicate = "Title is accounted for with a preexisting featured artist";
	public static $titleProducerDuplicate = "Title is accounted for with a preexisting producer";
	public static $titleWriterDuplicate = "Title is accounted for with a preexisting writer";
	public static $titleEngineerDuplicate = "Title is accounted for with a preexisting engineer";

	public static $couldNotBeSubmitted = "Values could not be submitted";
	
}
?>