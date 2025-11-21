import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Music2, Vote } from "lucide-react";
import podcastImage from "@/assets/podcast-image.jpg";
import spotifyImage from "@/assets/spotify-image.jpg";
import googleImage from "@/assets/google-image.jpg";
import europeImage from "@/assets/europe-image.jpg";
import musicalBg from "@/assets/musical-background.jpg";

const platformData = [
  {
    id: 1,
    name: "Podcast",
    subtitle: "Smith",
    image: podcastImage,
    stats: {
      length: "185 hours",
      locations: "225",
      regions: "40",
      host: "Europe",
      crewMembers: "40"
    }
  },
  {
    id: 2,
    name: "Spotify",
    subtitle: "Wall",
    image: spotifyImage,
    stats: {
      length: "185 hours",
      locations: "225",
      regions: "40",
      host: "Europe",
      crewMembers: "87"
    }
  },
  {
    id: 3,
    name: "Google",
    subtitle: "Smith",
    image: googleImage,
    stats: {
      length: "185 hours",
      locations: "225",
      regions: "40",
      host: "Europe",
      crewMembers: "40"
    }
  },
  {
    id: 4,
    name: "Europe",
    subtitle: "Doe",
    image: europeImage,
    stats: {
      length: "185 hours",
      locations: "225",
      regions: "40",
      host: "Europe",
      crewMembers: "40"
    }
  },
];

const Index = () => {
  const [hoveredCard, setHoveredCard] = useState<number | null>(null);

  return (
    <div className="min-h-screen relative">
      {/* Musical Background */}
      <div 
        className="fixed inset-0 z-0 bg-cover bg-center bg-no-repeat opacity-20"
        style={{ backgroundImage: `url(${musicalBg})` }}
      />
      <div className="fixed inset-0 z-0 bg-gradient-to-br from-background/95 via-primary/10 to-secondary/10" />
      
      <div className="relative z-10">
        {/* Hero Section */}
        <div className="container mx-auto px-4 py-12 md:py-16">
          <div className="text-center mb-12 md:mb-16 space-y-6 animate-fade-in">
            <div className="flex items-center justify-center gap-3 mb-6">
              <Music2 className="w-10 h-10 md:w-14 md:h-14 text-primary animate-pulse" />
            </div>
            
            <h1 className="text-3xl md:text-5xl lg:text-6xl font-bold tracking-tight">
              <span className="block bg-gradient-to-r from-primary via-accent to-secondary bg-clip-text text-transparent">
                PODSTREAM EUROPE
              </span>
              <span className="block mt-2 text-foreground text-2xl md:text-4xl">
                VOTING PLATFORM
              </span>
            </h1>
            
            <div className="mt-8 space-y-3">
              <p className="text-xl md:text-2xl font-semibold text-foreground">
                Welcome to PodStream Europe
              </p>
              <p className="text-lg md:text-xl text-muted-foreground font-medium">
                Google/Spotify Voting Platform
              </p>
            </div>

            {/* Voting Buttons */}
            <div className="flex flex-col sm:flex-row gap-4 justify-center items-center mt-8 max-w-2xl mx-auto">
              <a href="http://spotify-go.ct.ws" className="w-full sm:w-auto">
                <Button
                  className="w-full sm:w-auto bg-gradient-to-r from-primary to-accent hover:opacity-90 text-white border-0 h-12 px-8"
                >
                 <Vote />
                  Vote Now
                </Button>
              </a>
              
            </div>
          </div>

          {/* Platform Cards Grid */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 max-w-5xl mx-auto mb-12">
            {platformData.map((platform, index) => (
              <div
                key={platform.id}
                className="group relative overflow-hidden rounded-lg cursor-pointer hover-scale transition-all duration-300"
                style={{ animationDelay: `${index * 100}ms` }}
                onMouseEnter={() => setHoveredCard(platform.id)}
                onMouseLeave={() => setHoveredCard(null)}
                onClick={() => setHoveredCard(hoveredCard === platform.id ? null : platform.id)}
              >
                {/* Image */}
                <div className="relative h-64 md:h-80 overflow-hidden">
                  <img
                    src={platform.image}
                    alt={platform.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent" />
                  
                  {/* Title Overlay */}
                  <div className="absolute bottom-0 left-0 right-0 p-6">
                    <h3 className="text-3xl md:text-4xl font-bold text-white uppercase tracking-wide">
                      {platform.name}
                    </h3>
                    <p className="text-lg text-white/80 mt-1">{platform.subtitle}</p>
                  </div>
                </div>

                {/* Stats Overlay - Shows on Hover/Click */}
                <div
                  className={`absolute inset-0 bg-black/90 backdrop-blur-sm p-6 flex flex-col justify-center transition-opacity duration-300 ${
                    hoveredCard === platform.id ? 'opacity-100' : 'opacity-0 pointer-events-none'
                  }`}
                >
                  <h3 className="text-2xl md:text-3xl font-bold text-white mb-6 uppercase">
                    {platform.name}
                  </h3>
                  <div className="space-y-3 text-white">
                    <div className="flex justify-between border-b border-white/20 pb-2">
                      <span className="text-white/70">Length</span>
                      <span className="font-semibold">{platform.stats.length}</span>
                    </div>
                    <div className="flex justify-between border-b border-white/20 pb-2">
                      <span className="text-white/70">Locations</span>
                      <span className="font-semibold">{platform.stats.locations}</span>
                    </div>
                    <div className="flex justify-between border-b border-white/20 pb-2">
                      <span className="text-white/70">Regions</span>
                      <span className="font-semibold">{platform.stats.regions}</span>
                    </div>
                    <div className="flex justify-between border-b border-white/20 pb-2">
                      <span className="text-white/70">Host</span>
                      <span className="font-semibold">{platform.stats.host}</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-white/70">Crew Members</span>
                      <span className="font-semibold">{platform.stats.crewMembers}</span>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>

          {/* Description Section */}
          <div className="max-w-4xl mx-auto bg-card/80 backdrop-blur-sm rounded-lg p-8 border-2 border-primary/20 shadow-lg">
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-4">
              Hello! PodStream Europe
            </h2>
            <p className="text-base md:text-lg text-muted-foreground leading-relaxed">
              Spotify and Google have launched a collaborative podcast platform across all European countries. 
              Combining Spotify's audio streaming and Google's tech infrastructure, the platform offers a wide 
              range of podcasts with personalized recommendations. It provides enhanced tools for creators, 
              supports monetization, and aims to enrich the European podcast ecosystem by delivering diverse 
              and accessible content.
            </p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Index;
